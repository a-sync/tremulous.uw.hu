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

if (!in_array("comment",$access)) {
	include ("./includes/admin_main.php");
	} else {

if ($panel == "edit") {
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	if ($id) {
		if ($do == "edit") {
			$update = "UPDATE `".$mysql_prefix."_comments` SET `comment_pname` = '$name', `comment_pemail` = '$email', `comment_pwebsite` = '$website', `comment_topic` = '$topic', `comment_post` = '$post', `comment_approved` = '1' WHERE `comment_id` = '$id'";
			mysql_query($update) || $error = mysql_error();
			if (!$error)
				$error = $lng["comedited"];
			}

		$query = mysql_query("SELECT * FROM `".$mysql_prefix."_comments` WHERE `comment_id` = '$id'");
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
			<form method="POST" action="<?php echo $scriptname; ?>">
				<input type="hidden" name="action" value="<?php echo $action; ?>" />
				<input type="hidden" name="op" value="<?php echo $op; ?>" />
				<input type="hidden" name="panel" value="<?php echo $panel; ?>" />
				<input type="hidden" name="do" value="edit" />
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<?php echo $SIDFORM."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["editcom"]; ?></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["name"]; ?>&nbsp;</td><td width="50%"><input type="text" name="name" value="<?php echo $data[2]; ?>" /></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["email"]; ?>&nbsp;</td><td width="50%"><input type="text" name="email" value="<?php echo $data[3]; ?>" /></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["weburl"]; ?>&nbsp;</td><td width="50%"><input type="text" name="website" value="<?php echo $data[4]; ?>" /></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["title"]; ?>&nbsp;</td><td width="50%"><input type="text" name="topic" value="<?php echo $data[6]; ?>" /></td></tr>
					<tr><td align="center" colspan="2"><textarea name="post" rows=5 cols=60><?php echo $data[7]; ?></textarea></td></tr>
					<tr><td align="right" width="50%"><?php echo $lng["postip"]; ?>&nbsp;</td><td width="50%"><?php echo $data[5]; ?></td></tr>
					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["edit"]; ?>" /></td></tr>
				</table>
				</form>
		<?php
		} else {
		?>
			<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["editcom"]; ?></td></tr>
<?php
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	$count = 0;
	while ($row = mysql_fetch_object($query)) {
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "") {
			echo "\t\t\t\t\t<tr><td align=\"center\" class=\"specialcat\" colspan=\"2\"><b>== $row->cat_name ==</b></td></tr>\n";

			if (!in_array("editnews",$access))
				$where = " AND `news_auth_id` = '$_LOGIN[id]'";
			$query2 = mysql_query("SELECT * FROM `".$mysql_prefix."_news` WHERE `news_catid` = '$row->cat_id'$where");
			$count2 = 0;
			while ($row2 = mysql_fetch_object($query2)) {
				echo "\t\t\t\t\t<tr><td align=\"center\">$row2->news_title</td></tr>\n";

				$query3 = mysql_query("SELECT * FROM `".$mysql_prefix."_comments` WHERE `comment_nid` = '$row2->news_id'");
				$count3 = 0;
				while ($row3 = mysql_fetch_object($query3)) {
					$tag = $row3->comment_approved ? "" : "* ";

					$commtopic = $row3->comment_topic;
					$commtopic = preg_replace("/>/","&gt;",$commtopic);
					$commtopic = preg_replace("/</","&lt;",$commtopic);
                  
					echo "\t\t\t\t\t<tr><td align=\"center\">&gt;&gt; $tag<a href=\"$scriptname?action=$action&amp;op=$op&amp;panel=$panel&amp;id=$row3->comment_id&amp;$SIDLINK\">(ID:".$row3->comment_id.") ".$commtopic."</a> &lt;&lt;</td></tr>\n";
					$count3++;
					}
				if (!$count3)
					echo "\t\t\t\t\t<tr><td align=\"center\">&gt;&gt; ".$lng["nocomm"]." &lt;&lt;</td></tr>\n";

				++$count2;
				}
			if (!$count2)
				echo "\t\t\t\t\t<tr><td align=\"center\">".$lng["nonews"]."</td></tr>\n";


			++$count;
			}
		}
	if (!$count)
		echo "\t\t\t\t\t<tr><td align=\"center\" class=\"specialcat\" colspan=\"2\"><b>== ".$lng["nocats"]." ==</b></td></tr>\n";
	?>
				</table>
		<?php
		}
	} else if ($panel == "delete") {
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	if ($do == "delete") {
		foreach ($delete as $key => $value) {
			mysql_query("DELETE FROM `".$mysql_prefix."_comments` WHERE `comment_id` = '$key'");
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
					<tr><td class="header" colspan="2"><?php echo $lng["delcomm"]; ?></td></tr>
<?php
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	$count = 0;
	while ($row = mysql_fetch_object($query)) {
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "") {
			echo "\t\t\t\t\t<tr><td align=\"center\" colspan=\"2\" class=\"specialcat\"><b>== $row->cat_name ==</b></td></tr>\n";

			if (!in_array("editnews",$access))
				$where = " AND `news_auth_id` = '$_LOGIN[id]'";
			$query2 = mysql_query("SELECT * FROM `".$mysql_prefix."_news` WHERE `news_catid` = '$row->cat_id'$where");
			$count2 = 0;
			while ($row2 = mysql_fetch_object($query2)) {
				echo "\t\t\t\t\t<tr><td align=\"center\">$row2->news_title</td></tr>\n";

				$query3 = mysql_query("SELECT * FROM `".$mysql_prefix."_comments` WHERE `comment_nid` = '$row2->news_id'");
				$count3 = 0;
				while ($row3 = mysql_fetch_object($query3)) {
					$tag = $row3->comment_approved ? "" : " checked=\"checked\"";

					$commtopic = $row3->comment_topic;
					$commtopic = preg_replace("/>/","&gt;",$commtopic);
					$commtopic = preg_replace("/</","&lt;",$commtopic);

					echo "\t\t\t\t\t<tr><td align=\"center\">&gt;&gt; <input type=\"checkbox\" name=\"delete[$row3->comment_id]\"$tag /> (ID:".$row3->comment_id.") ".$commtopic." &lt;&lt;</TD></TR>\n";
					$count3++;
					}
				if (!$count3)
					echo "\t\t\t\t\t<tr><td align=\"center\">&gt;&gt; ".$lng["nocomm"]." &lt;&lt;</td></tr>\n";


				++$count2;
				}
			if (!$count2)
				echo "\t\t\t\t\t<tr><td align=\"center\">".$lng["nonews"]."</td></tr>\n";


			++$count;
			}
		}
	if (!$count)
		echo "\t\t\t\t\t<tr><td align=\"center\" colspan=\"2\" class=\"specialcat\"><b>== ".$lng["nocats"]." ==</b></td></tr>\n";
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