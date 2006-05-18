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

if (!in_array("cat",$access)) {
	include ("./includes/admin_main.php");
	} else {
if ($panel == "add") {
	if ($do == "add") {
		if (!$catname) {
			$error = $lng['noblank'];
			} else {
			$query = mysql_query("INSERT INTO `".$mysql_prefix."_cat` VALUES ('','$catname','$link','')") || $error = mysql_error();
			}
		if (!$error) {
			$catname = "";
			$error = $lng["catadded"];
			}
		}

	$linkercats = "";
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query =  mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	while ($row = mysql_fetch_object($query)) {
//		$categname = $row->cat_name;
//		$categname = preg_replace("/>/","&gt;",$categname);
//		$categname = preg_replace("/</","&lt;",$categname);
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "")
			$linkercats .= "\t\t\t\t\t<option value=\"$row->cat_id\">$row->cat_name</option>\r\n";
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
				<form action="<?php echo $scriptname; ?>" method="post">
				<input name="action" type="hidden" value="<?php echo $action; ?>" />
				<input name="op" type="hidden" value="<?php echo $op; ?>" />
				<input name="panel" type="hidden" value="<?php echo $panel; ?>" />
				<input name="do" type="hidden" value="add" />
				<?php echo $SIDFORM."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td colspan="2" class="header"><?php echo $lng["addcat"]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["name"]; ?>&nbsp;</td><td align="center"><input type="text" name="catname" value="<?php echo $catname; ?>" /></td></tr>
					<tr><td align="right"><?php echo $lng["linkto"]; ?>&nbsp;</td><td align="center"><select name="link">
					<option value="0"><?php echo $lng["notlink"]; ?></option>
<?php echo $linkercats; ?>
					</select></td></tr>

					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["add"]; ?>" /></td></tr>
				</table>
				</form>
<?php
	} else if ($panel == "edit") {
	if ($catid) {
		if ($do == "edit") {
			$cataccess = explode("|",$_LOGIN["cataccess"]);
			if (in_array($catid,$cataccess) || $_LOGIN["cataccess"] == "") {
				if (!$catname) {
					$error = $lng['noblank'];
					} else {
					$doquery = "UPDATE `".$mysql_prefix."_cat` SET ";
					$doquery .= "`cat_name` = '$catname', ";
					$doquery .= "`cat_link` = '$link'";

					$doquery .= " WHERE `cat_id` = '$catid';";

					mysql_query($doquery);
					}
				} else {
				$error = $lng["error3"];
				}
			}

		$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` WHERE `cat_id` = '$catid'");
		$data = mysql_fetch_row($query);

		$linkercats = "";
		$cataccess = explode("|",$_LOGIN["cataccess"]);
		$query =  mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
		while ($row = mysql_fetch_object($query)) {
			if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "") {
				$selected = ($data[2] == $row->cat_id) ? " selected=\"selected\"" : "";

				if ($data[0] != $row->cat_id)
//					$categname = $row->cat_name;
//					$categname = preg_replace("/>/","&gt;",$categname);
//					$categname = preg_replace("/</","&lt;",$categname);
					$linkercats .= "\t\t\t\t\t<option value=\"$row->cat_id\"$selected>$row->cat_name</option>\n";
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
			<form action="<?php echo $scriptname; ?>" method="post">
				<input name="action" type="hidden" value="<?php echo $action; ?>" />
				<input name="op" type="hidden" value="<?php echo $op; ?>" />
				<input name="panel" type="hidden" value="<?php echo $panel; ?>" />
				<input name="do" type="hidden" value="edit" />
				<input name="catid" type="hidden" value="<?php echo $catid; ?>" />
				<?php echo $SIDFORM."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["editcat"]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["name"]; ?>&nbsp;</td><td align="center"><input type="text" name="catname" value="<?php echo $data[1]; ?>" /></td></tr>
					<tr><td align="right"><?php echo $lng["linkto"]; ?>&nbsp;</td><td align="center"><select name="link">
					<option value="0"><?php echo $lng["notlink"]; ?></option>
<?php echo $linkercats; ?>
					</select></td></tr>

					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["edit"]; ?>" /></td></tr>
				</table>
				</form>
<?php
		} else {
?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["editcat"]; ?></td></tr>
<?php
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	while ($row = mysql_fetch_object($query)) {
//		$categname = $row->cat_name;
//		$categname = preg_replace("/>/","&gt;",$categname);
//		$categname = preg_replace("/</","&lt;",$categname);
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "")
			echo "\t\t\t\t\t<tr><td align=\"center\" colspan=\"2\"><a href=\"$scriptname?action=$action&amp;op=$op&amp;panel=$panel&amp;catid=$row->cat_id&amp;$SIDLINK\">$row->cat_name</a></td></tr>\n";
		}
	?>
				</table>
		<?php
		}
	} else if ($panel == "delete") {
	if ($do == "delete") {
		$cataccess = explode("|",$_LOGIN["cataccess"]);
		foreach ($delete as $key => $value) {
			if (in_array($key,$cataccess) || $_LOGIN["cataccess"] == "")
				mysql_query("DELETE FROM `".$mysql_prefix."_cat` WHERE `cat_id` = '$key'");
				mysql_query("DELETE FROM `".$mysql_prefix."_news` WHERE `news_catid` = '$key'");
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
				<input type="hidden" name="do" value="delete" />
				<?php echo $SIDFORM."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["delcats"]; ?></td></tr>
<?php
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query =  mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	while ($row = mysql_fetch_object($query)) {
		$categname = $row->cat_name;
		$categname = preg_replace("/>/","&gt;",$categname);
		$categname = preg_replace("/</","&lt;",$categname);
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "")
			echo "\t\t\t\t\t<tr><td align=\"center\" colspan=\"2\"><input type=\"checkbox\" name=\"delete[$row->cat_id]\" /> $categname</td></tr>\n";
		}
?>
					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["delete"]; ?>" /></td></tr>
				</table>
				</form>
	<?php
	} else if ($panel == "reorder") {
	if ($do == "reorder") {
		$cataccess = explode("|",$_LOGIN["cataccess"]);
		foreach ($order as $key => $value) {
			if (in_array($key,$cataccess) || $_LOGIN["cataccess"] == "")
				mysql_query("UPDATE `".$mysql_prefix."_cat` SET `cat_order` = '$value' WHERE `cat_id` = '$key'");
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
				<input type="hidden" name="do" value="reorder" />
				<?php echo $SIDFORM."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["reocats"]; ?></td></tr>
<?php
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query =  mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	while ($row = mysql_fetch_object($query)) {
//		$categname = $row->cat_name;
//		$categname = preg_replace("/>/","&gt;",$categname);
//		$categname = preg_replace("/</","&lt;",$categname);
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "")
			echo "\t\t\t\t\t<tr><td align=\"center\" colspan=\"2\"><input type=\"text\" name=\"order[$row->cat_id]\" size=\"2\" value=\"$row->cat_order\" /> $row->cat_name</td></tr>\n";
		}
	?>
					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["update"]; ?>" /></td></tr>
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