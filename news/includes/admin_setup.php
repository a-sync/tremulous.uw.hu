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

$disabled = " disabled=\"disabled\"";
if (is_writable("./config.php")) {
	$disabled = "";
	}

if ($do == "updatesets") {
	$disvercheck = $form[disvercheck];
	$lang = $form[lang];
	$showpost = $form[showpost];
	$perpage = $form[perpage];
	$cbboff = $form[cbboff];
	$cbbcolor = $form[cbbcolor];
	$cbbalign = $form[cbbalign];
	$cbbsize = $form[cbbsize];
	$cbbimg = $form[cbbimg];
	$cbbimg2 = $form[cbbimg2];
	$cbburl = $form[cbburl];
	$cbburl2 = $form[cbburl2];
	$cbblink = $form[cbblink];
	$cbblink2 = $form[cbblink2];
	$cbbb = $form[cbbb];
	$cbbu = $form[cbbu];
	$cbbi = $form[cbbi];
	$comments = $form[comments];
	$limit = $form[limit];
	$newdays = $form[newdays];
	$autoapprove = $form[autoapprove];

$content = "<?php\r\n\r\n"
	. "/*\r\n"
	. "  paNews 2.0 Beta 4\r\n"
	. "  ©2003 PHP Arena\r\n"
	. "  Written by Andrew Langland\r\n"
	. "  Origional by Dan\r\n"
	. "  andy@razza.org\r\n"
	. "  http://www.phparena.net\r\n"
	. "  Keep all copyright links on the script visible\r\n"
	. "  Please read the license included with this script for more information.\r\n"
	. "*/\r\n\r\n"
	. "// Security\r\n"
	. "if (\$_GET['IS_PANEWS'] || \$_POST['IS_PANEWS'])\r\n"
	. "	\$IS_PANEWS = 0;\r\n"
	. "if (!\$IS_PANEWS) {\r\n"
	. "	?>\r\n"
	. "	<script language=\"javascript\">\r\n"
	. "		<!--\r\n"
	. "		function hahaha() {\r\n"
	. "			alert(\"Dont try to hack you n00b!/Ne próbálj hackerkedni te lamer!\");\r\n"
	. "			setTimeout(\"hahaha()\",0);\r\n"
	. "		}\r\n\r\n"
	. "		window.onload=hahaha;\r\n"
	. "		//->\r\n"
	. "	</script>\r\n"
	. "	<?php\r\n"
	. "	}\r\n\r\n"
	. "// MySQL Information\r\n"
	. "\$mysql_host = \"$mysql_host\";\r\n"
	. "\$mysql_username = \"$mysql_username\";\r\n"
	. "\$mysql_password = \"$mysql_password\";\r\n"
	. "\$mysql_database = \"$mysql_database\";\r\n"
	. "\$mysql_prefix = \"$mysql_prefix\";\r\n\r\n"
	. "// General Settings\r\n"
	. "\$showpost = $showpost;\r\n"
	. "\$perpage = $perpage;\r\n"
	. "\$cbboff = $cbboff;\r\n"
	. "\$cbbcolor = $cbbcolor;\r\n"
	. "\$cbbalign = $cbbalign;\r\n"
	. "\$cbbsize = $cbbsize;\r\n"
	. "\$cbbimg = $cbbimg;\r\n"
	. "\$cbbimg2 = $cbbimg2;\r\n"
	. "\$cbburl = $cbburl;\r\n"
	. "\$cbburl2 = $cbburl2;\r\n"
	. "\$cbblink = $cbblink;\r\n"
	. "\$cbblink2 = $cbblink2;\r\n"
	. "\$cbbb = $cbbb;\r\n"
	. "\$cbbu = $cbbu;\r\n"
	. "\$cbbi = $cbbi;\r\n"
	. "\$comments = $comments;\r\n"
	. "\$limit = $limit;\r\n"
	. "\$newdays = $newdays;\r\n"
	. "\$autoapprove = $autoapprove;\r\n"
	. "\$showcopy = $showcopy;\r\n"
	. "\$lang = \"$lang\";\r\n"
	. "\$authtype = \"$authtype\"; // cookies, http, or sessions - In order of suggestion.\r\n\r\n"
	. "// Removing the copyright is illegal unless you paid the $50 fee! The fee\r\n"
	. "//	is subject to change but no matter! Keep it on!\r\n\r\n"
	. "// System Information\r\n"
	. "// - DO NOT CHANGE -\r\n"
	. "\$disvercheck = $disvercheck; // Set this to 1 if you don't want version check.\r\n"
	. "\$version = \"$version\";\r\n"
	. "\$installed = $installed;\r\n\r\n"
	. "?>";

		$config = fopen ("./config.php", "w");
		$contents2 = fwrite ($config, $content) || $error = $lng["cantupdate"];
		fclose ($config);

		if (!$error)
			$error = $lng["settup"];
		}

	$langmenu = "";
	$langs = opendir("./lang/");
	while ($stuff = readdir($langs)) {
		if (preg_match("/.lng.php$/i",$stuff)) {
			$langname = substr($stuff,0,strlen($stuff) - strlen(".lng.php"));
			$selected = ($lang == $langname) ? " selected=\"selected\"" : "";
			$langmenu .= "<option value=\"$langname\"$selected>$langname</option>\r\n";
			}
		}

	$disvckmenu = "";
	$def = ($disvercheck == 1) ? " selected=\"selected\"" : "";
	$disvckmenu .= "<option value=\"1\"$def>$lng[no]</option>";
	$def = ($disvercheck == 0) ? " selected=\"selected\"" : "";
	$disvckmenu .= "<option value=\"0\"$def>$lng[yes]</option>";

	$showpostmenu = "";
	$def = ($showpost == 1) ? " selected=\"selected\"" : "";
	$showpostmenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($showpost == 0) ? " selected=\"selected\"" : "";
	$showpostmenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$perpagemenu = "";
	$def = ($perpage == 0) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"0\"$def>$lng[all]</option>";
	$def = ($perpage == 1) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"1\"$def>1</option>";
	$def = ($perpage == 2) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"2\"$def>2</option>";
	$def = ($perpage == 3) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"3\"$def>3</option>";
	$def = ($perpage == 4) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"4\"$def>4</option>";
	$def = ($perpage == 5) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"5\"$def>5</option>";
	$def = ($perpage == 6) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"6\"$def>6</option>";
	$def = ($perpage == 7) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"7\"$def>7</option>";
	$def = ($perpage == 8) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"8\"$def>8</option>";
	$def = ($perpage == 9) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"9\"$def>9</option>";
	$def = ($perpage == 10) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"10\"$def>10</option>";
	$def = ($perpage == 15) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"15\"$def>15</option>";
	$def = ($perpage == 20) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"20\"$def>20</option>";
	$def = ($perpage == 25) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"25\"$def>25</option>";
	$def = ($perpage == 30) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"30\"$def>30</option>";
	$def = ($perpage == 50) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"50\"$def>50</option>";
	$def = ($perpage == 99) ? " selected=\"selected\"" : "";
	$perpagemenu .= "<option value=\"99\"$def>99</option>";

	$cbboffmenu = "";
	$def = ($cbboff == 0) ? " selected=\"selected\"" : "";
	$cbboffmenu .= "<option value=\"0\"$def>$lng[yes]</option>";
	$def = ($cbboff == 1) ? " selected=\"selected\"" : "";
	$cbboffmenu .= "<option value=\"1\"$def>$lng[no]</option>";

	$cbbcolormenu = "";
	$def = ($cbbcolor == 1) ? " selected=\"selected\"" : "";
	$cbbcolormenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbbcolor == 0) ? " selected=\"selected\"" : "";
	$cbbcolormenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbbalignmenu = "";
	$def = ($cbbalign == 1) ? " selected=\"selected\"" : "";
	$cbbalignmenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbbalign == 0) ? " selected=\"selected\"" : "";
	$cbbalignmenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbbsizemenu = "";
	$def = ($cbbsize == 1) ? " selected=\"selected\"" : "";
	$cbbsizemenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbbsize == 0) ? " selected=\"selected\"" : "";
	$cbbsizemenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbbimgmenu = "";
	$def = ($cbbimg == 1) ? " selected=\"selected\"" : "";
	$cbbimgmenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbbimg == 0) ? " selected=\"selected\"" : "";
	$cbbimgmenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbbimg2menu = "";
	$def = ($cbbimg2 == 1) ? " selected=\"selected\"" : "";
	$cbbimg2menu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbbimg2 == 0) ? " selected=\"selected\"" : "";
	$cbbimg2menu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbburlmenu = "";
	$def = ($cbburl == 1) ? " selected=\"selected\"" : "";
	$cbburlmenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbburl == 0) ? " selected=\"selected\"" : "";
	$cbburlmenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbburl2menu = "";
	$def = ($cbburl2 == 1) ? " selected=\"selected\"" : "";
	$cbburl2menu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbburl2 == 0) ? " selected=\"selected\"" : "";
	$cbburl2menu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbblinkmenu = "";
	$def = ($cbblink == 1) ? " selected=\"selected\"" : "";
	$cbblinkmenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbblink == 0) ? " selected=\"selected\"" : "";
	$cbblinkmenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbblink2menu = "";
	$def = ($cbblink2 == 1) ? " selected=\"selected\"" : "";
	$cbblink2menu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbblink2 == 0) ? " selected=\"selected\"" : "";
	$cbblink2menu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbbbmenu = "";
	$def = ($cbbb == 1) ? " selected=\"selected\"" : "";
	$cbbbmenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbbb == 0) ? " selected=\"selected\"" : "";
	$cbbbmenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbbumenu = "";
	$def = ($cbbu == 1) ? " selected=\"selected\"" : "";
	$cbbumenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbbu == 0) ? " selected=\"selected\"" : "";
	$cbbumenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$cbbimenu = "";
	$def = ($cbbi == 1) ? " selected=\"selected\"" : "";
	$cbbimenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($cbbi == 0) ? " selected=\"selected\"" : "";
	$cbbimenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$commenu = "";
	$def = ($comments == 1) ? " selected=\"selected\"" : "";
	$commenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($comments == 0) ? " selected=\"selected\"" : "";
	$commenu .= "<option value=\"0\"$def>$lng[no]</option>";

	$limmenu = "";
	$def = ($limit == 0) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"0\"$def>$lng[all]</option>";
	$def = ($limit == 1) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"1\"$def>1</option>";
	$def = ($limit == 2) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"2\"$def>2</option>";
	$def = ($limit == 3) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"3\"$def>3</option>";
	$def = ($limit == 4) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"4\"$def>4</option>";
	$def = ($limit == 5) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"5\"$def>5</option>";
	$def = ($limit == 6) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"6\"$def>6</option>";
	$def = ($limit == 7) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"7\"$def>7</option>";
	$def = ($limit == 8) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"8\"$def>8</option>";
	$def = ($limit == 9) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"9\"$def>9</option>";
	$def = ($limit == 10) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"10\"$def>10</option>";
	$def = ($limit == 15) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"15\"$def>15</option>";
	$def = ($limit == 20) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"20\"$def>20</option>";
	$def = ($limit == 25) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"25\"$def>25</option>";
	$def = ($limit == 30) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"30\"$def>30</option>";
	$def = ($limit == 50) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"50\"$def>50</option>";
	$def = ($limit == 99) ? " selected=\"selected\"" : "";
	$limmenu .= "<option value=\"99\"$def>99</option>";

	$newdmenu = "";
	$def = ($newdays == 0) ? " selected=\"selected\"" : "";
	$newdmenu .= "<option value=\"0\"$def>0</option>";
	$def = ($newdays == 1) ? " selected=\"selected\"" : "";
	$newdmenu .= "<option value=\"1\"$def>1</option>";
	$def = ($newdays == 2) ? " selected=\"selected\"" : "";
	$newdmenu .= "<option value=\"2\"$def>2</option>";
	$def = ($newdays == 3) ? " selected=\"selected\"" : "";
	$newdmenu .= "<option value=\"3\"$def>3</option>";
	$def = ($newdays == 4) ? " selected=\"selected\"" : "";
	$newdmenu .= "<option value=\"4\"$def>4</option>";
	$def = ($newdays == 5) ? " selected=\"selected\"" : "";
	$newdmenu .= "<option value=\"5\"$def>5</option>";
	$def = ($newdays == 7) ? " selected=\"selected\"" : "";
	$newdmenu .= "<option value=\"10\"$def>10</option>";
	$def = ($newdays == 14) ? " selected=\"selected\"" : "";
	$newdmenu .= "<option value=\"14\"$def>14</option>";
	$def = ($newdays == 30) ? " selected=\"selected\"" : "";
	$newdmenu .= "<option value=\"30\"$def>30</option>";

	$appmenu = "";
	$def = ($autoapprove == 1) ? " selected=\"selected\"" : "";
	$appmenu .= "<option value=\"1\"$def>$lng[yes]</option>";
	$def = ($autoapprove == 0) ? " selected=\"selected\"" : "";
	$appmenu .= "<option value=\"0\"$def>$lng[no]</option>";

	if ($error) {
		?>
			<table align="center" border="1" class="error">
					<tr>
						<td align="center" class="error"><?php echo $error; ?></td>
					</tr>
				</table><br />
		<?php
		}

	if (!$disvercheck) {
		$checkurl = "http://www.phparena.net/remote_panews.php?act=vercheck&curver=".urlencode($version);
		if (!$_LOGIN['verresult']) {
			$result = @file($checkurl);
			if ($authtype == "sessions") {
				$verresult = $result;
				session_register("verresult");
				}
			} else {
			$result = $_LOGIN['verresult'];
			}
		$info = explode("|",$result[0]);

		if ($info[0] == 1) {
			$upinfo = $version;
			} else {
			$info[2] = preg_replace("/&/","&amp;",$info[2]);
			$info[2] = preg_replace("/&amp;amp;/","&amp;",$info[2]);
			$info[2] = preg_replace("/\r/","",$info[2]);
			$info[2] = preg_replace("/\n/","",$info[2]);
			$upinfo = "$version (<a href=\"$info[2]\" target=\"_blank\">$info[1] ".$lng["avail"]."</a>)";
			}
		} else {
		$upinfo = $version . " (<a href=\"http://www.phparena.net/panews.php\" target=\"_blank\">!</a>)";
		}

?>
			<form method="post" action="<?php echo $scriptname; ?>">
				<input type="hidden" name="action" value="<?php echo $action; ?>" />
				<input type="hidden" name="op" value="<?php echo $op; ?>" />
				<input type="hidden" name="panel" value="<?php echo $panel; ?>" />
				<input type="hidden" name="do" value="updatesets" />
				<?php echo $SIDFORM."\r\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["upsets"]; ?></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["newsitems"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[limit]"<?php echo $disabled; ?>>
					<?php echo $limmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["newdays"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[newdays]"<?php echo $disabled; ?>>
					<?php echo $newdmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["lang"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[lang]"<?php echo $disabled; ?>>
					<?php echo $langmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["version"]; ?>&nbsp;<?php echo $lng["update"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[disvercheck]"<?php echo $disabled; ?>>
					<?php echo $disvckmenu; ?></select></td></tr>
					<tr><td class="header" colspan="2"><?php echo $lng["comments"]; ?></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["alcom"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[comments]"<?php echo $disabled; ?>>
					<?php echo $commenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["autoapprove"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[autoapprove]"<?php echo $disabled; ?>>
					<?php echo $appmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["showpost"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[showpost]"<?php echo $disabled; ?>>
					<?php echo $showpostmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["perpage"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[perpage]"<?php echo $disabled; ?>>
					<?php echo $perpagemenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbboff"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbboff]"<?php echo $disabled; ?>>
					<?php echo $cbboffmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbbb"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbbb]"<?php echo $disabled; ?>>
					<?php echo $cbbbmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbbu"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbbu]"<?php echo $disabled; ?>>
					<?php echo $cbbumenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbbi"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbbi]"<?php echo $disabled; ?>>
					<?php echo $cbbimenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbbcolor"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbbcolor]"<?php echo $disabled; ?>>
					<?php echo $cbbcolormenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbbalign"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbbalign]"<?php echo $disabled; ?>>
					<?php echo $cbbalignmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbbsize"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbbsize]"<?php echo $disabled; ?>>
					<?php echo $cbbsizemenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbbimg"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbbimg]"<?php echo $disabled; ?>>
					<?php echo $cbbimgmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbbimg2"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbbimg2]"<?php echo $disabled; ?>>
					<?php echo $cbbimg2menu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbburl"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbburl]"<?php echo $disabled; ?>>
					<?php echo $cbburlmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbburl2"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbburl2]"<?php echo $disabled; ?>>
					<?php echo $cbburl2menu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbblink"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbblink]"<?php echo $disabled; ?>>
					<?php echo $cbblinkmenu; ?></select></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["cbblink2"]; ?>&nbsp;</td><td align="center" width="50%"><select name="form[cbblink2]"<?php echo $disabled; ?>>
					<?php echo $cbblink2menu; ?></select></td></tr>
					<tr><td class="header" colspan="2"><?php echo $lng["sysinfo"]; ?></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["version"]; ?>&nbsp;</td><td align="center" width="50%"><?php echo $upinfo; ?></td></tr>
					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["update"]; ?>"<?php echo $disabled; ?> /></td></tr>
				</table>
				</form>
<?php
	}