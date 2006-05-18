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

//error_reporting(E_ALL);

// To prevent possible security risks
$IS_PANEWS = TRUE;

include("./config.php");
require("./lang/$lang.lng.php");

if (!$installed)
	Header("Location: install.php");

if ($authtype == "sessions") {
	session_save_path("./sessions/");
	session_start();
	$SIDLINK = strip_tags (SID);
	$SIDFORM = "<input name=\"".session_name()."\" type=\"hidden\" value=\"".session_id()."\" />";
	} else {
	$SIDLINK = "";
	$SIDFORM = "";
	}

include("./includes/functions.php");
include("./includes/database.php");
$scriptname = "index.php";

$mysql->connect();

extract($_GET);
extract($_POST);

include("./includes/auth.php");

if ($action == "login") {
	$done = $auth->login();
	} else if ($action == "logoff") {
	$auth->logoff();
	} else if (md5($action) == "") {
	// This is for the phparena staff. It is simply for debugging purposes.
	// If you do not like the idea of this being here... Simply remove:
	// 8e31d9de70421ac6d33b50887b523a5b from above.
	phpinfo();
	exit;
	}

$logged = $auth->auth();
$loggedinfo = "";
if ($logged) {
	$loggedinfo = " - ". $lng['loginas'] ." ".$_LOGIN['username'];
	$action = "";
	}

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
		<title>paNews v<?php echo $version; echo $loggedinfo; ?></title>
		<link rel="StyleSheet" href="panews.css" type="text/css" />
	</head>
	<body>
<?php
switch ($action) {
	case 'login':
		include("./includes/login.php");
	break;
	default:
		if ($logged)
			include("./includes/admin.php");
			else
			include("./includes/login.php");
	break;
	}

// Removing these lines is illegal unless you paid the $50 fee! The fee
//	is subject to change but no matter! Keep these lines! Even if you
//	do pay, the copyright is removed with the variable!
if ($showcopy) {
	?>
	<h5 align="center"><font color="#CCCCCC"><i>&copy; paNews <?php echo $version; ?></i></font></a></h5>
	<?php
	}
?>
</body>
</html>