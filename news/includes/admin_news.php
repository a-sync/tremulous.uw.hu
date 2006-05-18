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

if (!in_array("newsadd",$access)) {
	include ("./includes/admin_main.php");
	} else {

if ($panel == "add") {
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	if ($do == "add") {
		if (!$newstitle) {
			$error = $lng["error4"];
			} else if (!$newscat) {
			$error = $lng["error5"];
			} else if (!in_array($newscat,$cataccess) && !$_LOGIN["cataccess"] == "") {
			$error = $lng["error6"];
			} else if (!$newnews) {
			$error = $lng["error7"];
			} else {
			mysql_query("INSERT INTO `".$mysql_prefix."_news` valueS('','$newscat','$_LOGIN[id]','$newstitle','$newnews',UNIX_TIMESTAMP())") || $error = mysql_error();
			if (!$error)
				$error = $lng["newsadded"];
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
			<script language="javascript" type="text/javascript">
				<!--
				function pacode_align(align) {
					var align;
	
					var text = prompt("<?php echo $lng["textali"]; ?>","");

					if (text == null)
						return;

					if (text !== null)
					document.form.newnews.value += "[align="+align+"]"+text+"[/align]";
					document.form.newnews.focus();
					}
				function pacode_color(color) {
					var color;

					if (color == "ask")
						color = prompt("<?php echo $lng["coloth"]; ?>","#000000");

					var text = prompt("<?php echo $lng["textcol"]; ?>","");

					if (text !== null)
					document.form.newnews.value += "[color="+color+"]"+text+"[/color]";
					document.form.newnews.focus();
					}
				function pacode_size(size) {
					var size;

					var text = prompt("<?php echo $lng["textsiz"]; ?>","");

					if (text !== null)
					document.form.newnews.value += "[size="+size+"]"+text+"[/size]";
					document.form.newnews.focus();
					}
				function pacode_url() {
					var url = prompt("<?php echo $lng["urlurl"]; ?>","");

					if (url == null || url.length < 16)
						return false;

					var text = prompt("<?php echo $lng["urltxt"]; ?>","");

					if (text == null || text.length == 0 || text == url)
						document.form.newnews.value += "[url]"+url+"[/url]";
						else
						document.form.newnews.value += "[url="+url+"]"+text+"[/url]";

					document.form.newnews.focus();
					}
				function notext(tag) {
					var tag;
					document.form.newnews.value += "["+tag+"][/"+tag+"]";
					document.form.newnews.focus();
					}
				function pacode_noclose(tag,value) {
					var tag,value;

					if (value !== null && value.length > 24)
					document.form.newnews.value += "["+tag+"="+value+"]";
					document.form.newnews.focus();
					}
				//-->
			</script>
			<form method="post" action="<?php echo $scriptname; ?>" name="form">
				<input type="hidden" name="action" value="<?php echo $action; ?>" />
				<input type="hidden" name="op" value="<?php echo $op; ?>" />
				<input type="hidden" name="panel" value="<?php echo $panel; ?>" />
				<input type="hidden" name="do" value="add" />
				<?php echo $SIDform; ?>
<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["addnews"]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["title"]; ?>&nbsp;</td><td align="center"><input type="text" name="newstitle" value="<?php echo $newstitle; ?>" /></td></tr>
					<tr><td align="right"><?php echo $lng["cat"]; ?>&nbsp;</td><td align="center"><select name="newscat">
<?php
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	$count = 0;
	while ($row = mysql_fetch_object($query)) {
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "") {
			$default = ($newscat == $row->cat_id) ? " selected=\"selected\"" : "";
			echo "\t\t\t\t\t<option value=\"$row->cat_id\"$default>$row->cat_name</option>\n";
			++$count;
			}
		}
	if (!$count)
		echo "\t\t\t\t\t<option value=\"0\">-- ".$lng["nocats"]." --</option>\n";
	?>
					</select></td></tr>
					<tr><td align="center" colspan="2">
					<script language="javascript" type="text/javascript">
						<!--
						document.write("<select onchange=\"pacode_color(this.value); this.value=''; return true\">");
						document.write("<option value=\"\"><?php echo $lng["colors"]; ?></option>");
<?php
						foreach ($colors as $code => $text) {
							echo "\t\t\t\t\t\tdocument.write(\"<option value=\\\"#$code\\\">$text</option>\");\r\n";
							}
?>
						document.write("<option value=\"ask\"><?php echo $lng["other"]; ?></option>");
						document.write("</select>");
						document.write("<select onchange=\"pacode_align(this.value); this.value=''; return true\">");
						document.write("<option value=\"\"><?php echo $lng["alignm"]; ?></option>");
						document.write("<option value=\"left\"><?php echo $lng["alignml"]; ?></option>");
						document.write("<option value=\"center\"><?php echo $lng["alignmc"]; ?></option>");
						document.write("<option value=\"right\"><?php echo $lng["alignmr"]; ?></option>");
						document.write("</select>");
						document.write("<select onchange=\"pacode_size(this.value); this.value=''; return true\">");
						document.write("<option value=\"\"><?php echo $lng["size"]; ?></option>");
						document.write("<option value=\"-5\">-5</option>");
						document.write("<option value=\"-4\">-4</option>");
						document.write("<option value=\"-3\">-3</option>");
						document.write("<option value=\"-2\">-2</option>");
						document.write("<option value=\"-1\">-1</option>");
						document.write("<option value=\"0\">0</option>");
						document.write("<option value=\"1\">1</option>");
						document.write("<option value=\"2\">2</option>");
						document.write("<option value=\"3\">3</option>");
						document.write("<option value=\"4\">4</option>");
						document.write("<option value=\"5\">5</option>");
						document.write("</select>");
						document.write("<input type=\"button\" value=\"b\" onclick=\"notext('b')\" />");
						document.write("<input type=\"button\" value=\"i\" onclick=\"notext('i')\" />");
						document.write("<input type=\"button\" value=\"u\" onclick=\"notext('u')\" />");
						document.write("<input type=\"button\" value=\"Kép\" onclick=\"pacode_noclose('img',prompt('<?php echo $lng['imgtext']; ?>',''))\" />");
						document.write("<input type=\"button\" value=\"URL\" onclick=\"pacode_url()\" />");
						//-->
					</script>
					</td></tr>

					<tr><td align="right"><?php echo $lng["news"]; ?>&nbsp;</td><td align="center"><textarea rows="10" cols="50" name="newnews"><?php echo $newnews; ?></textarea></td></tr>
					<tr><td align="center" colspan="2"><input type="button" value="<?php echo $lng["add"]; ?>" onclick="if (newscat.value == 0) { alert('<?php echo $lng["error8"]; ?>'); return false } else { form.submit() }" /></td></tr>
				</table>
				</form>
	<?php
	} else if ($panel == "edit") {
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	if ($newsid) {
		if ($do == "edit") {
			if (in_array($newscat,$cataccess) || $_LOGIN["cataccess"] == "") {
				$update = "UPDATE `".$mysql_prefix."_news` SET `news_catid` = '$newscat', `news_title` = '$newstitle', `news_news` = '$newnews' WHERE `news_id` = '$newsid'";
				mysql_query($update) || $error = mysql_error();
				if (!$error)
					$error = $lng["newsupd"];
				} else {
				$error = $lng["error6"];
				}
			}

		if (!in_array("newsedit",$access))
			$where = " AND `news_auth_id` = '$_LOGIN[id]'";

		$query = mysql_query("SELECT * FROM `".$mysql_prefix."_news` WHERE `news_id` = '$newsid'$where");
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
			<script language="javascript" type="text/javascript">
				<!--
				function pacode_align(align) {
					var align;
	
					var text = prompt("<?php echo $lng["textali"]; ?>","");

					if (text == null)
						return;

					if (text !== null)
					document.form.newnews.value += "[align="+align+"]"+text+"[/align]";
					document.form.newnews.focus();
					}
				function pacode_color(color) {
					var color;

					if (color == "ask")
						color = prompt("<?php echo $lng["coloth"]; ?>","#000000");

					var text = prompt("<?php echo $lng["textcol"]; ?>","");

					if (text !== null)
					document.form.newnews.value += "[color="+color+"]"+text+"[/color]";
					document.form.newnews.focus();
					}
				function pacode_size(size) {
					var size;

					var text = prompt("<?php echo $lng["textsiz"]; ?>","");

					if (text !== null)
					document.form.newnews.value += "[size="+size+"]"+text+"[/size]";
					document.form.newnews.focus();
					}
				function pacode_url() {
					var url = prompt("<?php echo $lng["urlurl"]; ?>","");

					if (url == null || url.length < 16)
						return false;

					var text = prompt("<?php echo $lng["urltxt"]; ?>","");

					if (text == null || text.length == 0 || text == url)
						document.form.newnews.value += "[url]"+url+"[/url]";
						else
						document.form.newnews.value += "[url="+url+"]"+text+"[/url]";

					document.form.newnews.focus();
					}
				function notext(tag) {
					var tag;
					document.form.newnews.value += "["+tag+"][/"+tag+"]";
					document.form.newnews.focus();
					}
				function pacode_noclose(tag,value) {
					var tag,value;

					if (value !== null && value.length > 24)
					document.form.newnews.value += "["+tag+"="+value+"]";
					document.form.newnews.focus();
					}
				//-->
			</script>
			<form method="post" action="<?php echo $scriptname; ?>" name="form">
				<input type="hidden" name="action" value="<?php echo $action; ?>" />
				<input type="hidden" name="op" value="<?php echo $op; ?>" />
				<input type="hidden" name="panel" value="<?php echo $panel; ?>" />
				<input type="hidden" name="do" value="edit" />
				<input type="hidden" name="newsid" value="<?php echo $newsid; ?>" />
				<?php echo $SIDform."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["newsedit"]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["title"]; ?>&nbsp;</td><td align="center"><input type="text" name="newstitle" value="<?php echo $data[3]; ?>" /></td></tr>
					<tr><td align="right"><?php echo $lng["cat"]; ?>&nbsp;</td><td align="center"><select name="newscat">
<?php
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	$count = 0;
	while ($row = mysql_fetch_object($query)) {
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "") {
			$default = ($data[1] == $row->cat_id) ? " selected=\"selected\"" : "";
			echo "\t\t\t\t\t<option value=\"$row->cat_id\"$default>$row->cat_name</option>\n";
			++$count;
			}
		}
	if (!$count)
		echo "\t\t\t\t\t<option value=\"0\">-- ".$lng["nocats"]." --</option>\n";
	?>
					</select></td></tr>
					<tr><td align="center" colspan="2">
					<script language="javascript" type="text/javascript">
						<!--
						document.write("<select onchange=\"pacode_color(this.value); this.value=''; return true\">");
						document.write("<option value=\"\"><?php echo $lng["colors"]; ?></option>");
<?php
						foreach ($colors as $code => $text) {
							echo "\t\t\t\t\t\tdocument.write(\"<option value=\\\"#$code\\\">$text</option>\");\r\n";
							}
?>
						document.write("<option value=\"ask\"><?php echo $lng["other"]; ?></option>");
						document.write("</select>");
						document.write("<select onchange=\"pacode_align(this.value); this.value=''; return true\">");
						document.write("<option value=\"\"><?php echo $lng["alignm"]; ?></option>");
						document.write("<option value=\"left\"><?php echo $lng["alignml"]; ?></option>");
						document.write("<option value=\"center\"><?php echo $lng["alignmc"]; ?></option>");
						document.write("<option value=\"right\"><?php echo $lng["alignmr"]; ?></option>");
						document.write("</select>");
						document.write("<select onchange=\"pacode_size(this.value); this.value=''; return true\">");
						document.write("<option value=\"\"><?php echo $lng["size"]; ?></option>");
						document.write("<option value=\"-5\">-5</option>");
						document.write("<option value=\"-4\">-4</option>");
						document.write("<option value=\"-3\">-3</option>");
						document.write("<option value=\"-2\">-2</option>");
						document.write("<option value=\"-1\">-1</option>");
						document.write("<option value=\"0\">0</option>");
						document.write("<option value=\"1\">1</option>");
						document.write("<option value=\"2\">2</option>");
						document.write("<option value=\"3\">3</option>");
						document.write("<option value=\"4\">4</option>");
						document.write("<option value=\"5\">5</option>");
						document.write("</select>");
						document.write("<input type=\"button\" value=\"b\" onclick=\"notext('b')\" />");
						document.write("<input type=\"button\" value=\"i\" onclick=\"notext('i')\" />");
						document.write("<input type=\"button\" value=\"u\" onclick=\"notext('u')\" />");
						document.write("<input type=\"button\" value=\"Image\" onclick=\"pacode_noclose('img',prompt('<?php echo $lng['imgtext']; ?>',''))\" />");
						document.write("<input type=\"button\" value=\"URL\" onclick=\"pacode_url()\" />");
						//-->
					</script>
					</td></tr>

					<tr><td align="right"><?php echo $lng["news"]; ?>&nbsp;</td><td align="center"><textarea rows="10" cols="50" name="newnews"><?php echo $data[4]; ?></textarea></td></tr>
					<tr><td align="center" colspan="2"><input type="button" value="<?php echo $lng["edit"]; ?>" onclick="if (newscat.value == 0) { alert('<?php echo $lng["error8"]; ?>'); return false } else { form.submit() }" /></td></tr>
				</table>
			</form>
	<?php
		} else {
?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["newsedit"]; ?></td></tr>
<?php
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	$count = 0;
	while ($row = mysql_fetch_object($query)) {
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "") {
			echo "\t\t\t\t\t<tr><td align=\"center\" colspan=\"2\" class=\"specialcat\"><b>== $row->cat_name ==</b></td></tr>\n";

			if (!in_array("newsedit",$access))
				$where = " AND `news_auth_id` = '$_LOGIN[id]'";
			$query2 = mysql_query("SELECT * FROM `".$mysql_prefix."_news` WHERE `news_catid` = '$row->cat_id'$where");
			$count2 = 0;
			while ($row2 = mysql_fetch_object($query2)) {
				echo "\t\t\t\t\t<tr><td align=\"center\"><a href=\"$scriptname?action=$action&amp;op=$op&amp;panel=$panel&amp;newsid=$row2->news_id&amp;$SIDLINK\">$row2->news_title</a></td></tr>\n";
				++$count2;
				}
			if (!$count2)
				echo "\t\t\t\t\t<tr><td align=\"center\">".$lng["nonews"]."</td></tr>\n";


			++$count;
			}
		}
	if (!$count)
		echo "\t\t\t\t\t<tr><td align=\"center\" BGCOLOR=\"#000000\" COLSPAN=\"2\"><FONT COLOR=\"#FFFFFF\"><B>== ".$lng["nocats"]." ==</B></FONT></td></tr>\n";
?>
				</table>
	<?php
		}
	} else if ($panel == "delete") {
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	if ($do == "delete") {
		foreach ($delete as $key => $value) {
			mysql_query("DELETE FROM `".$mysql_prefix."_news` WHERE `news_id` = '$key'");
			mysql_query("DELETE FROM `".$mysql_prefix."_comments` WHERE `comment_nid` = '$key'");
			}
		}
	?>
			<form method="post" action="<?php echo $scriptname; ?>">
				<input type="hidden" name="action" value="<?php echo $action; ?>" />
				<input type="hidden" name="op" value="<?php echo $op; ?>" />
				<input type="hidden" name="panel" value="<?php echo $panel; ?>" />
				<input type="hidden" name="do" value="delete" />
				<?php echo $SIDform."\n"; ?>

				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["delnews"]; ?></td></tr>
<?php
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	$count = 0;
	while ($row = mysql_fetch_object($query)) {
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "") {
			echo "\t\t\t\t\t<tr><td align=\"center\" colspan=\"2\" class=\"specialcat\"><b>== $row->cat_name ==</b></td></tr>\n";

			if (!in_array("newsedit",$access))
				$where = " AND `news_auth_id` = '$_LOGIN[id]'";
			$query2 = mysql_query("SELECT * FROM `".$mysql_prefix."_news` WHERE `news_catid` = '$row->cat_id'$where");
			$count2 = 0;
			while ($row2 = mysql_fetch_object($query2)) {
				echo "\t\t\t\t\t<tr><td align=\"center\"><input type=\"checkbox\" name=\"delete[$row2->news_id]\" /> $row2->news_title</td></tr>\n";
				++$count2;
				}
			if (!$count2)
				echo "\t\t\t\t\t<tr><td align=\"center\">".$lng["nonews"]."</td></tr>\n";


			++$count;
			}
		}
	if (!$count)
		echo "\t\t\t\t\t<tr><td align=\"center\" COLSPAN=\"2\" class=\"specialcat\"><b>== ".$lng["nocats"]." ==</b></td></tr>\n";
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