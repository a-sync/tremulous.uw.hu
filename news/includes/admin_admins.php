<?php

/*
  paNews 2.0 Beta 4
  ©2003 PHP Arena
  Written by Andrew Langland
  Origional by Dan
  andy@razza.org
  http://www.phparena.net
  Keep all copyright links on the script visible
  Please read the license included with this script for more information.
*/

// Security
if ($_GET['IS_PANEWS'] || $_POST['IS_PANEWS'])
	$IS_PANEWS = 0;
if (!$IS_PANEWS) {
	?>
	<script language="javascript">
		<!--
		function hahaha() {
			alert("Dont try to hack you n00b!/Ne próbálj hackerkedni te lamer!");
			setTimeout("hahaha()",0);
		}

		window.onload=hahaha;
		//->
	</script>
	<?php
	exit;
	}

if (!in_array("admins",$access)) {
	include ("./includes/admin_main.php");
	} else {

if (!isset($access))
	$access = array();

if ($panel == "add") {
	if ($do == "add") {
		if (!$newusr) {
			$error = $lng["error1"];
			} else if (!$newps) {
			$error = $lng["error2"];
			} else {
			$newusr = strtolower($newusr);
			$newps = MD5(strtolower($newps));
			$newaccess = $newaccess ? implode ("|",$newaccess) : "";
			$newcataccess = $newcataccess ? implode ("|",$newcataccess) : "";
			$query = mysql_query("INSERT INTO `".$mysql_prefix."_auth` VALUES ('','$newusr','$newps','$email','$newaccess','$newcataccess','',UNIX_TIMESTAMP(),'0')") || $error = mysql_error();
			if (!$error) {
				$newusr = "";
				$newps = "";
				$email = "";
				$newaccess = array();
				$newcataccess = array();
				$error = $lng["ua"];
				}
			}
		}

	if ($error) {
?>
				<table align="center" border="1" class="error">
					<tr>
						<td align="center" class="error"><?php echo $error; ?></td>
					</tr>
				</table><br />
<?php
		}
	?>
			<form method="post" action="<?php echo $scriptname; ?>">
				<input type="hidden" name="action" value="<?php echo $action; ?>" />
				<input type="hidden" name="op" value="<?php echo $op; ?>" />
				<input type="hidden" name="panel" value="<?php echo $panel; ?>" />
				<input type="hidden" name="do" value="add" />
				<?php echo $SIDFORM."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["addadmin"]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["username"]; ?>&nbsp;</td><td align="center"><input type="text" name="newusr" value="<?php echo $newusr; ?>" /></td></tr>
					<tr><td align="right"><?php echo $lng["password"]; ?>&nbsp;</td><td align="center"><input type="text" name="newps" value="<?php echo $newps; ?>" /></td></tr>
					<tr><td align="right"><?php echo $lng["email"]; ?>&nbsp;</td><td align="center"><input type="text" name="email" value="<?php echo $email; ?>" /></td></tr>
					<tr><td align="right"><?php echo $lng["access"]; ?>&nbsp;</td><td align="center">
					<select name="newaccess[]" size="4" multiple="multiple">
<?php
	foreach ($user_access as $key => $value) {
		echo "\t\t\t\t\t\t<option value=\"$key\" selected=\"selected\">".$user_access_def[$key]."</option>\n";
		}
?>
					</select>
					</td></tr>
					<tr><td align="right"><?php echo $lng["cataccess"]; ?>&nbsp;</td><td align="center">
					<select name="newcataccess[]" size="4" multiple="multiple">
<?php
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	while ($row = mysql_fetch_object($query)) {
		echo "\t\t\t\t\t\t<option value=\"$row->cat_id\" selected=\"selected\">$row->cat_name</option>\n";
		}
?>
					</select>
					</td></tr>
					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["add"]; ?>" /></td></tr>
				</table>
				</form>
	<?php
	} else if ($panel == "edit") {
	if ($userid) {
		if ($do == "updateuser") {
			$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth` WHERE `auth_id` = '$userid'");
			$data = mysql_fetch_row($query);

			$newaccess = $newaccess ? implode("|",$newaccess) : "";
			$newcataccess = $newcataccess ? implode("|",$newcataccess) : "";

			$doquery = "UPDATE `".$mysql_prefix."_auth` SET ";
			$doquery .= "`auth_email` = '$email', ";
			$doquery .= "`auth_access` = '$newaccess', ";
			$doquery .= "`auth_cataccess` = '$newcataccess'";

			if ($newps) {
				$newps = MD5($newps);
				$doquery .= ", `auth_password` = '$newps'";
				}

			$doquery .= " WHERE `auth_id` = '$userid';";

			mysql_query($doquery);
			}
		$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth` WHERE `auth_id` = '$userid'");
		$data = mysql_fetch_row($query);

		?>
			<form method="post" action="<?php echo $scriptname; ?>">
				<input type="hidden" name="action" value="<?php echo $action; ?>" />
				<input type="hidden" name="op" value="<?php echo $op; ?>" />
				<input type="hidden" name="panel" value="<?php echo $panel; ?>" />
				<input type="hidden" name="userid" value="<?php echo $userid; ?>" />
				<input type="hidden" name="do" value="updateuser" />
				<?php echo $SIDFORM."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["editadmin"]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["username"]; ?>&nbsp;</td><td align="center"><?php echo $data[1]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["password"]; ?>&nbsp;</td><td align="center"><input type="text" name="newps" value="" /></td></tr>
					<tr><td align="right"><?php echo $lng["email"]; ?>&nbsp;</td><td align="center"><input type="text" name="email" value="<?php echo $data[3]; ?>" /></td></tr>
					<tr><td align="right"><?php echo $lng["access"]; ?>&nbsp;</td><td align="center">
					<select name="newaccess[]" size="4" multiple="multiple">
<?php
	$useraccess = explode("|",$data[4]);
	foreach ($user_access as $key => $value) {
		$select = in_array($key,$useraccess) ? " selected=\"selected\"" : "";
		echo "\t\t\t\t\t\t<option value=\"$key\"$select>".$user_access_def[$key]."</option>\n";
		}
?>
					</select>
					</td></tr>
					<tr><td align="right"><?php echo $lng["cataccess"]; ?>&nbsp;</td><td align="center">
					<select name="newcataccess[]" size="4" multiple="multiple">
<?php
	$usercataccess = explode("|",$data[5]);
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	while ($row = mysql_fetch_object($query)) {
		$select = in_array($row->cat_id,$usercataccess) ? " selected=\"selected\"" : "";
		echo "\t\t\t\t\t\t<option value=\"$row->cat_id\"$select>$row->cat_name</option>\n";
		}
?>
					</select>
					</td></tr>
					<tr><td align="right"><?php echo $lng["lastip"]; ?>&nbsp;</td><td align="center"><?php echo $data[6]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["credate"]; ?>&nbsp;</td><td align="center"><?php echo date("Y.m.d. - H:i ", $data[7]); ?></td></tr>
					<tr><td align="right"><?php echo $lng["lastlogin"]; ?>&nbsp;</td><td align="center"><?php echo date("Y.m.d. - H:i ", $data[8]); ?></td></tr>
					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["edit"]; ?>" /></td></tr>
				</table>
				</form>
		<?php
		} else {
		?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["editadmin"]; ?></td></tr>
<?php
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth` WHERE `auth_username` != '$_LOGIN[username]'");
	while ($row = mysql_fetch_object($query)) {
		$adminname = $row->auth_username;
		$adminname = preg_replace("/>/","&gt;",$adminname);
		$adminname = preg_replace("/</","&lt;",$adminname);
		echo "\t\t\t\t\t<tr><td align=\"center\" colspan=\"2\"><a href=\"$scriptname?action=$action&amp;op=$op&amp;panel=$panel&amp;userid=$row->auth_id&amp;$SIDLINK\">$adminname</a></td></tr>\n";
		}
	?>
				</table>
	<?php
		}

	} else if ($panel == "delete") {
	if ($do == "delete") {
		foreach ($delete as $key => $value) {
			mysql_query("DELETE FROM `".$mysql_prefix."_auth` WHERE `auth_id` = '$key'");
			}
		}
	?>
			<form method="post" action="<?php echo $scriptname; ?>">
				<input type="hidden" name="action" value="<?php echo $action; ?>" />
				<input type="hidden" name="op" value="<?php echo $op; ?>" />
				<input type="hidden" name="panel" value="<?php echo $panel; ?>" />
				<input type="hidden" name="do" value="delete" />
				<?php echo $SIDFORM."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["deleteadmins"]; ?></td></tr>
<?php
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth` WHERE `auth_username` != '$_LOGIN[username]'");
	while ($row = mysql_fetch_object($query)) {
		$adminname = $row->auth_username;
		$adminname = preg_replace("/>/","&gt;",$adminname);
		$adminname = preg_replace("/</","&lt;",$adminname);
		echo "\t\t\t\t\t<tr><td align=\"center\" colspan=\"2\"><input type=\"checkbox\" name=\"delete[$row->auth_id]\" /> $adminname</td></tr>\n";
		}
	?>
					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["delete"]; ?>" /></td></tr>
				</table>
				</form>
	<?php
	} else {
	$error = $lng["invpanel"];
?>
				<table align="center" border="1" class="error">
					<tr>
						<td align="center" class="error"><?php echo $error; ?></td>
					</tr>
				</table><br />
<?php
	}
	}
?>