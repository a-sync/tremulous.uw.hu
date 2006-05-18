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

extract($_GET);
extract($_POST);

// Security
if ($_GET['IS_PANEWS'] || $_POST['IS_PANEWS'])
	$IS_PANEWS = 0;
if (file_exists("./lock.php")) {
	include "./lock.php";
	}

// To prevent possible security risks
$IS_PANEWS = TRUE;

include("./config.php");

if ($install)
	Header("Location: index.php");

if (!$step)
	$step = 0;

$step_name = array();
$step_name[] = "Welcome";
$step_name[] = "License";
$step_name[] = "Configuration";
$step_name[] = "Save Configuration";
$step_name[] = "SQL Data Insertion";
$step_name[] = "Check Files";
$step_name[] = "Complete";

$step_part = array();
$step_part[] = "Welcome Screen";
$step_part[] = "License";
$step_part[] = "Settings";
$step_part[] = "Save Config File";
$step_part[] = "SQL Queries";
$step_part[] = "Check Files";
$step_part[] = "Completed";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
		<title>paNews v<?php echo $version; echo $loggedinfo; ?>_vec</title>
	</head>
	<body>
	<table border="5" align="center">
		<tr><td>&nbsp;<font size="4"><b>paNews v<?php echo $version; ?>_vec Installer</b>&nbsp;</font></td></tr>
	</table><br />
	<table border="0" align="center">
		<tr><td>
		<?php

		foreach ($step_name as $key => $value) {
			if ($key < $step) {
				$done = "Done";
				} else if ($key == $step) {
				$done = "x";
				} else {
				$done = "&nbsp;";
				}
			echo "[$done] $value&nbsp;&nbsp;";
			}
		?>
		</td></tr>
	</table><br />
<?php

if ($step_part[$step] == "Welcome Screen") {
	?>
	<p>Welcome to the new paNews v<?php echo $version; ?>! This is the current installer that
	I have made for paNews. If you find any bugs in paNews, please email them to
	panews@phparena.net. Your help in this script is appreciated. Also remember that this
	script is still in its developmental stages. There probably are still bugs in this
	though I am attempting to remove the possibility. Thanks for your help.</p>
	<form method="get" action="<?php echo $PHP_SELF; ?>">
	<table border="0" align="center"><tr><td>
		<input type="hidden" name="step" value="<?php echo ++$step; ?>" />
		<input type="submit" value="Continue -->" />
		</td></tr>
	</table>
	</form>
	<?php
	} else if ($step_part[$step] == "License") {
	?>
	<script language="javascript">
		<!--
		function startagree() {
			document.form.agree.disabled=true;
			setTimeout("enable()",1000);
			}
		function enable() {
			document.form.agree.disabled=false;
			}
		window.onload=startagree;
		//-->
	</script>

	<p align="center">PHP Arena License<br/><br/>
	Please read this whole file before installing this PHP Arena script.<br/><br/>
	This PHP Arena script is free to use and modify for almost all websites as long as you do not remove the script copyright and link to the PHP Arena homepage on the bottom of scripts.<br/><br/>
	PHP Arena scripts cannot be used on sites that offer or promote:<br/>
	-Piracy (Software/music/movie/etc piracy)<br/>
	-Hacking/Cracking<br/>
	-Pornography of any type<br/>
	-Any other illegal activity<br/>
	If your site is not included in that list and you keep the copyright info in the script, you may use and modify this PHP Arena script.<br/><br/>
	You may distribute PHP Arena scripts as long as:<br/> 
	A) You receive no payment for it except for costs such as internet fees (ISP, hosting, etc) and disc duplication and distribution. (This includes installation and modifications.)<br/>
	B) You do not modify it in any way.<br/>
	C) You distribute in the original zip file from PHP Arena's website (http://www.phparena.net) with all the files, including this license file.<br/><br/>
	You may use PHP Arena scripts on any number of websites you like as long as all those websites are not included in the above list of websites that PHP Arena scripts can't be used on.<br/><br/>
	You may freely distribute any modifications you make for PHP Arena scripts, but you can not distribute a whole copy of PHP Arena scripts with your modifications in it. Modifications made available must contain instructions on modifying the file, not the already-modified file.<br/><br/>
	In no event will PHP Arena be liable to you for any consequential, incidental, or indirect damages (including damages for loss of business profits, business interruption, loss of business information, and the like) arising out of the use or inability to use PHP Arena scripts.<br/><br/>
	If this license agreement is broken, you must cease to use and destroy any copies of this script you have installed.<br/>
	If a PHP Arena staff member finds you breaking this agreement, s/he will send you an e-mail asking you to cease using and destroy the copy of the script that is breaking the agreement. You will have 24 hours after the e-mail is sent to destroy the copy. If it is still up and running after 24 hours, legal action will be taken.<br/><br/>
	PHP Arena has the right to change this agreement at any time. Any changes will be posted on the PHP Arena website (http://www.phparena.net/) and it is your responsibility to check for changes. If the agreement changes and then causes your copy of the script to break this agreement, PHP Arena still has the right to take legal action.<br/> <br/>
	For any queries about the license, or to report and violations, please e-mail license@phparena.net.</p>
	<form method="get" name="form" action="<?php echo $PHP_SELF; ?>">
	<table border="0" align="center"><tr><td>
		<input type="hidden" name="step" value="<?php echo ++$step; ?>" />
		<input id="agree" type="submit" value="I Agree" />
		</td></tr>
	</table>
	</form>
	<?php
	} else if ($step_part[$step] == "Settings") {
	?>
	<table border="5" align="center">
		<tr><td>&nbsp;<font size="4"><b>Configuration</b>&nbsp;</font></td></tr>
	</table><br />
	<form method="post" action="<?php echo $PHP_SELF; ?>">
	<table border="2" align="center">
		<?php
		if (!is_writable("./config.php")) {
			?>
		<tr><td>
			<b>Error! config.php must be world-writable!</b>
		</td></td>
			<?php
			} else {
			?>
		<tr>
			<td>MySQL Host</td>
			<td><input type="text" name="form[mysql_host]" value="<?php echo $mysql_host; ?>" /></td>
		</tr><tr>
			<td>MySQL Username</td>
			<td><input type="text" name="form[mysql_username]" value="<?php echo $mysql_username; ?>" /></td>
		</tr><tr>
			<td>MySQL Password</td>
			<td><input type="password" name="form[mysql_password]" value="<?php echo $mysql_password; ?>" /></td>
		</tr><tr>
			<td>MySQL Database</td>
			<td><input type="text" name="form[mysql_database]" value="<?php echo $mysql_database; ?>" /></td>
		</tr><tr>
			<td>MySQL Prefix</td>
			<td><input type="text" name="form[mysql_prefix]" value="<?php echo $mysql_prefix; ?>" /></td>
		</tr>
			<?php
			}
?>
	</table>
	<table border="0" align="center"><tr><td>
		<input type="hidden" name="step" value="<?php echo ++$step; ?>" />
		<input type="submit" value="Continue -->" />
	</td></tr></table>
	</form>
	<?php
	} else if ($step_part[$step] == "Save Config File") {

$content = "<?php

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
if (\$_GET['IS_PANEWS'] || \$_POST['IS_PANEWS'])
	\$IS_PANEWS = 0;
if (!\$IS_PANEWS) {
	?>
	<script language=\"javascript\">
		<!--
		function hahaha() {
			alert(\"Dont try to hack you n00b!/Ne próbálj hackerkedni te lamer!\");
			setTimeout(\"hahaha()\",0);
		}

		window.onload=hahaha;
		//->
	</script>
	<?php
	}

// MySQL Information
\$mysql_host = \"$form[mysql_host]\";
\$mysql_username = \"$form[mysql_username]\";
\$mysql_password = \"$form[mysql_password]\";
\$mysql_database = \"$form[mysql_database]\";
\$mysql_prefix = \"$form[mysql_prefix]\";

// General Settings

// Removing the copyright is illegal unless you paid the $50 fee! The fee
//	is subject to change but no matter! Keep it on!
\$showpost = 1;
\$perpage = 10;
\$cbboff = 0;
\$cbbcolor = 1;
\$cbbalign = 1;
\$cbbsize = 1;
\$cbbimg = 1;
\$cbbimg2 = 1;
\$cbburl = 1;
\$cbburl2 = 1;
\$cbblink = 1;
\$cbblink2 = 1;
\$cbbb = 1;
\$cbbu = 1;
\$cbbi = 1;
\$comments = $comments;
\$limit = 5;
\$newdays = 1;
\$autoapprove = $autoapprove;
\$showcopy = $showcopy;
\$lang = \"$lang\";
\$authtype = \"$authtype\"; // cookies, http, or sessions - In order of suggestion.

// System Information
// - DO NOT CHANGE -
\$version = \"$version\";
\$installed = 1;
\$disvercheck = $disvercheck; // Set this to 1 if you don't want version check.

?>";

	$config = fopen ("./config.php", "w");
	$contents2 = fwrite ($config, $content);
	fclose ($config);
	?>
	Configuration Saved

	<form method="get" action="<?php echo $PHP_SELF; ?>">
	<table border="0" align="center"><tr><td>
		<input type="hidden" name="step" value="<?php echo ++$step; ?>" />
		<input type="submit" value="Continue -->" />
		</td></tr>
	</table>
	</form>
	<?
	} else if ($step_part[$step] == "SQL Queries") {

	mysql_pconnect($mysql_host,$mysql_username,$mysql_password) || $error = mysql_error();
	if (!$error)
		mysql_select_db($mysql_database) || $error = mysql_error();

	if ($error) {
		?>
		<font color="#FF0000">Error: <?php echo $error; ?></font>
		<?php
		} else {
		?>
		MySQL Connection Okay.<br /><br />Inserting Data:<br /><br />
		<?php

		$sql = Array (
			$mysql_prefix ."_auth" =>
				"CREATE TABLE " . $mysql_prefix . "_auth (
				  auth_id int(11) NOT NULL auto_increment,
				  auth_username varchar(30) NOT NULL default '',
				  auth_password text NOT NULL,
				  auth_email text,
				  auth_access text,
				  auth_cataccess text,
				  auth_ip varchar(15) default '127.0.0.1',
				  auth_creation int(11) default NULL,
				  auth_lastlogin int(11) default NULL,
				  UNIQUE KEY auth_username (auth_username),
				  KEY auth_id (auth_id)
				) TYPE=MyISAM COMMENT='paNews User Table';",
			$mysql_prefix ."_cat" =>
				"CREATE TABLE " . $mysql_prefix . "_cat (
				  cat_id int(11) NOT NULL auto_increment,
				  cat_name varchar(30) NOT NULL default '',
				  cat_link int(11) default NULL,
				  cat_order int(11) default NULL,
				  UNIQUE KEY cat_name (cat_name),
				  KEY cat_id (cat_id)
				) TYPE=MyISAM COMMENT='paNews Category Table';",
			$mysql_prefix ."_comments" =>
				"CREATE TABLE " . $mysql_prefix . "_comments (
				  comment_id int(11) NOT NULL auto_increment,
				  comment_nid int(11) NOT NULL default '0',
				  comment_pname varchar(30) default NULL,
				  comment_pemail varchar(50) default NULL,
				  comment_pwebsite varchar(50) default NULL,
				  comment_pip varchar(15) default NULL,
				  comment_topic text NOT NULL,
				  comment_post text NOT NULL,
				  comment_stamp int(11) NOT NULL default '0',
				  comment_approved int(2) NOT NULL default '0',
				  KEY comment_id (comment_id,comment_pname),
				  FULLTEXT KEY comment_post (comment_post)
				) TYPE=MyISAM COMMENT='paNews Comments Table';",
			$mysql_prefix ."_news" =>
				"CREATE TABLE " . $mysql_prefix . "_news (
				  news_id int(11) NOT NULL auto_increment,
				  news_catid int(11) NOT NULL default '0',
				  news_auth_id int(11) NOT NULL default '0',
				  news_title varchar(30) NOT NULL default '',
				  news_news longtext NOT NULL,
				  news_start int(11) default NULL,
				  UNIQUE KEY news_title (news_title),
				  KEY news_id (news_id)
				) TYPE=MyISAM COMMENT='paNews News Table';",
			);

		foreach ($sql as $name => $data) {
			echo "Inserting data for <b>$name</b>... ";

			$error = 0;
			mysql_query($data) || $error = mysql_error();

			if ($error)
				echo "<font color=\"#FF0000\">Failed! ($error)</font>";
				else
				echo "Success!";

			echo "<br />\n";
			}

		?>
		All mysql queries run with success.
		<form method="get" action="<?php echo $PHP_SELF; ?>">
		<table border="0" align="center"><tr><td>
			<input type="hidden" name="step" value="<?php echo ++$step; ?>" />
			<input type="submit" value="Continue -->" />
			</td></tr>
		</table>
		</form>
		<?php
		}
	} else if ($step_part[$step] == "Check Files") {
	$files = array();

	$files[] = "comments.php";
	$files[] = "config.php";
	$files[] = "index.php";
	$files[] = "includes/admin.php";
	$files[] = "includes/admin_admins.php";
	$files[] = "includes/admin_category.php";
	$files[] = "includes/admin_comment.php";
	$files[] = "includes/admin_genssi.php";
	$files[] = "includes/admin_main.php";
	$files[] = "includes/admin_news.php";
	$files[] = "includes/admin_prefs.php";
	$files[] = "includes/admin_setup.php";
	$files[] = "includes/adminmenu.php";
	$files[] = "includes/auth.php";
	$files[] = "includes/database.php";
	$files[] = "includes/functions.php";
	$files[] = "includes/index.php";
	$files[] = "includes/login.php";
	$files[] = "lock.php";
	$files[] = "panews.css";
	$files[] = "sessions/index.php";
	$files[] = "viewnews.php";

	foreach ($files as $key => $id) {
		echo "\tChecking for <font color=\"#0000FF\">$id</font>... ";
		if (file_exists("./".$id)) {
			echo "Ok!<br />\n";
			} else {
			echo "Failed =(<br />\n";
			}
		}

	?>
	Please make sure that all these files have an 'OK!' by them. The installer will
	let you continue but the software will not work.
	<form method="get" action="<?php echo $PHP_SELF; ?>">
	<table border="0" align="center"><tr><td>
		<input type="hidden" name="step" value="<?php echo ++$step; ?>" />
		<input type="submit" value="Finish -->" />
	</td></tr></table>
	</form>
	<?php
	} else if ($step_part[$step] == "Completed") {

	$contents = "<?php

// Installer Protection
// Clear the contents of this file to re-enable
// The Installer
exit;

?>
	<script language=\"javascript\">
		<!--
		function hahaha() {
			alert(\"Dont try to hack you n00b!/Ne próbálj hackerkedni te lamer!\");
			setTimeout(\"hahaha()\",0);
		}

		window.onload=hahaha;
		//->
	</script>
";

	$locker = fopen ("./lock.php", "w");
	$contents2 = fwrite ($locker, $contents);
	fclose ($locker);

	echo "Complete! You may now go to <a href=\"index.php\">index.php</a> and set things up!";
	} else {
	?>
	<p><b>ERROR</b> - Invalid Step ID</p>
	<?php
	}

if ($showcopy) {
	?>
<p align="center">paNews <?php echo $version; ?>_vec &copy; 2003 <a href="http://www.phparena.net/" target="_new">phpArena</a></p>
	<?php
	}
?>
</body>
</html>