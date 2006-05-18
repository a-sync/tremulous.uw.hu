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

if (!in_array("prefset",$access)) {
	include ("./includes/admin_main.php");
	} else {

if ($do == "update") {
	if ($oldpw) {
		if ($oldpw != $_LOGIN["password"]) {
			$error = $lng["error9"];
			} else if ($newpw != $newpw2) {
			$error = $lng["error10"];
			} else if ($newpw == "") {
			$error = $lng["error2"];
			} else {
			$newpw = MD5($newpw);
			mysql_query("UPDATE `".$mysql_prefix."_auth` SET `auth_password` = '$newpw' WHERE `auth_username` = '$_LOGIN[username]'");
			$error = $lng["passup"];
			$_LOGIN['password'] = $newpw2;
			$password = $newpw2;
			if ($authtype == "cookies") {
				$cookiedata = explode("¿?",$_COOKIE["panews"]);
				$cookiedata[4] = $newpw2;
				setcookie("panews",implode("¿?",$cookiedata));
				$_COOKIE['panews'] = implode("¿?",$cookiedata);
				} else if ($authtype == "sessions") {
				session_register("password");
				} else {
				$PHP_AUTH_PW = $newpw2;
				}

			echo "<meta http-equiv='refresh' content='0; url=$PHP_SELF?action=admin&op=$op' />";
			}
		}

	if ($email) {
		mysql_query("UPDATE `".$mysql_prefix."_auth` SET `auth_email` = '$email' WHERE `auth_username` = '$_LOGIN[username]'");
		if (!$error)
			$error = $lng["settup"];
		}
	}

$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth` WHERE `auth_username` = '$_LOGIN[username]'");
$data = mysql_fetch_row($query);

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
				<input type="hidden" name="do" value="update" />
				<?php echo $SIDFORM."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["myacset"]; ?></td></tr>
					<tr><td class="header" colspan="2"><?php echo $lng["chpass"]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["oldpass"]; ?>&nbsp;</td><td align="center"><input type="password" name="oldpw" /></td></tr>
					<tr><td align="right"><?php echo $lng["newpass"]; ?>&nbsp;</td><td align="center"><input type="password" name="newpw" /></td></tr>
					<tr><td align="right"><?php echo $lng["newpass"]; ?> (<?php echo $lng["again"]; ?>)&nbsp;</td><td align="center"><input type="password" name="newpw2" /></td></tr>
					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["update"]; ?>" /></td></tr>
					<tr><td class="header" colspan="2"><?php echo $lng["uppref"]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["email"]; ?>&nbsp;</td><td align="center"><input type="text" name="email" value="<?php echo $data[3]; ?>" /></td></tr>
					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["update"]; ?>" /></td></tr>
				</table>
				</form>
<?php
	}