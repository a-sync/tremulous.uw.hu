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

$myip = getenv("REMOTE_ADDR");
if (!$myip)
	$myip = $_SERVER["REMOTE_ADDR"];

$_LOGIN = array();

class auth {
	function auth() {
		global $error,$mysql_prefix,$_COOKIE,$_SESSION,$_LOGIN,$myip,$authtype;

		if ($authtype == "sessions") {
			$error = 0;
			$pass2 = MD5($_SESSION["password"]);
			$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth` WHERE `auth_username` = lower('$_SESSION[username]') AND `auth_password` = '$pass2' AND `auth_ip` = '$myip'");
			$data = mysql_fetch_row($query);

			if (mysql_num_rows($query)) {
				$_SESSION["access"] = $data[4];
				$_SESSION["cataccess"] = $data[5];
				$_SESSION["id"] = $data[0];
				$_SESSION["lasttime"] = time();

				session_register("access");
				session_register("cataccess");
				session_register("id");
				session_register("lasttime");
				session_register("password");
				session_register("username");

				$_LOGIN = $_SESSION;
				return true;
				} else {
				return false;
				}
			} else if ($authtype == "http") {
			global $PHP_AUTH_USER,$PHP_AUTH_PW,$_LOGIN;
			if(!isset($PHP_AUTH_USER)) {
				$this->authenticate();
				} elseif(!$this->CheckPwd($PHP_AUTH_USER,$PHP_AUTH_PW)) {
				$this->authenticate();
				}
			return true;
			} else if ($authtype == "cookies") {
			$cookiedata = explode("¿?",$_COOKIE["panews"]);
			$error = 0;
			$pass2 = MD5($cookiedata[4]);
			$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth` WHERE `auth_username` = lower('$cookiedata[5]') AND `auth_password` = '$pass2' AND `auth_ip` = '$myip'");
			$data = mysql_fetch_row($query);

			if (mysql_num_rows($query)) {
				$_LOGIN["access"] = $data[4];
				$_LOGIN["cataccess"] = $data[5];
				$_LOGIN["id"] = $data[0];
				$_LOGIN["lasttime"] = time();
				$_LOGIN["password"] = $cookiedata[4];
				$_LOGIN["username"] = $cookiedata[5];

				return true;
				}
			}

		return false;
		}
	function login() {
		global $error,$mysql_prefix,$_COOKIE,$_SESSION,$_LOGIN,$_GET,$_POST,$myip,$authtype;

		extract ($_GET);
		extract ($_POST);

		$username = strtolower($username);
		$password = strtolower($password);

		$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth`");

		if (mysql_num_rows($query) == 0) {
			$pass2 = MD5($password);
			mysql_query("INSERT INTO `".$mysql_prefix."_auth` VALUES ('','$username','$pass2','','admins|cat|comment|newsadd|newsedit|prefset|setup','','$myip',UNIX_TIMESTAMP(),UNIX_TIMESTAMP())");

			if ($authtype == "sessions") {
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["lasttime"] = time();
				$_SESSION["access"] = "admins|cat|comment|newsadd|newsedit|prefset|setup";
				$_SESSION["cataccess"] = "";
				$_SESSION["verresult"] = 0;

				session_register("access");
				session_register("cataccess");
				session_register("id");
				session_register("lasttime");
				session_register("password");
				session_register("username");
				session_register("verresult");

				$_LOGIN = $_SESSION;

				Header("Location: ".$PHP_SELF. "?" . session_name() . "=" . session_id());
				} else if ($authtype == "http") {
				} else {
				$cookiedata = array();
				$cookiedata[0] = "";
				$cookiedata[1] = "admins|cat|comment|newsadd|newsedit|prefset|setup";
				$cookiedata[2] = 1;
				$cookiedata[3] = time();
				$cookiedata[4] = $password;
				$cookiedata[5] = $username;
				$cookiedata[6] = 0;

				$_LOGIN["access"] = $cookiedata[0];
				$_LOGIN["cataccess"] = $cookiedata[1];
				$_LOGIN["id"] = $cookiedata[2];
				$_LOGIN["lasttime"] = $cookiedata[3];
				$_LOGIN["password"] = $cookiedata[4];
				$_LOGIN["username"] = $cookiedata[5];
				$_LOGIN["verresult"] = $cookiedata[6];

				setcookie("panews",implode("¿?",$cookiedata));

				Header("Location: $PHP_SELF?".rand(0,5000));
				}
			}

		$error = 0;
		$pass2 = MD5($password);
		$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth` WHERE `auth_username` = '$username' AND `auth_password` = '$pass2'");

		if (mysql_num_rows($query)) {
			mysql_query("UPDATE `".$mysql_prefix."_auth` SET `auth_ip` = '".$myip."', `auth_lastlogin` = UNIX_TIMESTAMP() WHERE `auth_username` = '$username'");

			if ($authtype == "sessions") {
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["lasttime"] = time();
				$_SESSION["cataccess"] = "";
				$_SESSION["access"] = "";
				$_SESSION["verresult"] = 0;

				session_register("access");
				session_register("cataccess");
				session_register("id");
				session_register("lasttime");
				session_register("password");
				session_register("username");
				session_register("verresult");

				$_LOGIN = $_SESSION;
				Header("Location: ".$PHP_SELF. "?" . session_name() . "=" . session_id());
				return TRUE;
				} else if ($authtype == "http") {
				return true;
				} else {
				$cookiedata = array();
				$cookiedata[0] = "";
				$cookiedata[1] = "";
				$cookiedata[2] = 0;
				$cookiedata[3] = time();
				$cookiedata[4] = $password;
				$cookiedata[5] = $username;
				$cookiedata[6] = 0; // Vercheck

				$_LOGIN["access"] = $cookiedata[0];
				$_LOGIN["cataccess"] = $cookiedata[1];
				$_LOGIN["id"] = $cookiedata[2];
				$_LOGIN["lasttime"] = $cookiedata[3];
				$_LOGIN["password"] = $cookiedata[4];
				$_LOGIN["username"] = $cookiedata[5];
				$_LOGIN["verresult"] = $cookiedata[6];

				setcookie("panews",implode("¿?",$cookiedata));

				Header("Location: $PHP_SELF?".rand(0,5000));
				}

			} else {
			$error = $lng["invalseq"];
			}

		return false;
		}
	function logoff() {
		GLOBAL $_SESSION,$_COOKIE,$_LOGIN,$authtype,$PHP_AUTH_USER,$PHP_AUTH_PW;

		if ($authtype == "sessions") {
			foreach ($_SESSION as $key => $value) {
				if (!strstr($key, "AUTH")) { 
					$_SESSION[$key] = "";
					unset($_SESSION[$key]); 
					}
				}

			$_LOGIN = $_SESSION;

			Header("Location: $PHP_SELF?".rand(0,5000));
			} else if ($authtype == "http") {
			$PHP_AUTH_USER = "";
			$PHP_AUTH_PW = "";
			$this->authenticate();
			} else {
			setcookie("panews","");
			$_LOGIN = "";
			Header("Location: $PHP_SELF?".rand(0,5000));
			}
		}
	function authenticate() {
		global $lng;
		Header( "WWW-authenticate: basic realm=\"".$lng["realm"]."\"");
		Header( "HTTP/1.0 401 Unauthorized");
		echo   $lng["badauth"]."\n";
		exit;
		}
	function CheckPwd($user,$pass) {
		global $myip,$_LOGIN,$mysql_prefix;
		$error = 0;
		$pass2 = MD5($pass);

		$username = strtolower($user);
		$password = strtolower($pass);

		$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth`");

		if (mysql_num_rows($query) == 0 && $username && $pass) {
			$pass2 = MD5($password);
			mysql_query("INSERT INTO `".$mysql_prefix."_auth` VALUES ('','$username','$pass2','','admins|cat|comment|newsadd|newsedit|prefset|setup','','$myip',UNIX_TIMESTAMP(),UNIX_TIMESTAMP())");
			}

		$query = mysql_query("SELECT * FROM `".$mysql_prefix."_auth` WHERE `auth_username` = lower('$user') AND `auth_password` = '$pass2'");
		$data = mysql_fetch_row($query);

		if (mysql_num_rows($query)) {
			$_LOGIN["access"] = $data[4];
			$_LOGIN["cataccess"] = $data[5];
			$_LOGIN["id"] = $data[0];
			$_LOGIN["lasttime"] = time();
			$_LOGIN["password"] = $pass;
			$_LOGIN["username"] = $user;

			return true;
			}

		return false;
		}
	}
$auth = new auth;

?>