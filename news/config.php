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
	}

// MySQL Information
$mysql_host = "sql2.ultraweb.hu";
$mysql_username = "tremulous";
$mysql_password = "passw";
$mysql_database = "tremulous";
$mysql_prefix = "pn_";

// General Settings
$showpost = 1;
$perpage = 10;
$cbboff = 0;
$cbbcolor = 1;
$cbbalign = 1;
$cbbsize = 1;
$cbbimg = 1;
$cbbimg2 = 1;
$cbburl = 1;
$cbburl2 = 1;
$cbblink = 1;
$cbblink2 = 1;
$cbbb = 1;
$cbbu = 1;
$cbbi = 1;
$comments = 1;
$limit = 5;
$newdays = 1;
$autoapprove = 1;
$showcopy = 1;
$lang = "hungarian";
$authtype = "cookies"; // cookies, http, or sessions - In order of suggestion.

// Removing the copyright is illegal unless you paid the $50 fee! The fee
//	is subject to change but no matter! Keep it on!

// System Information
// - DO NOT CHANGE -
$disvercheck = 0; // Set this to 1 if you don't want version check.
$version = "2.0b4";
$installed = 0;

?>