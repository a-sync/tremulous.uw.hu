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

if (!$ssicat)
	$ssicat = 0;
if (!$ssiitems)
	$ssiitems = 5;

$ssicat = intval($ssicat);
$ssiitems = intval($ssiitems);
$newdays = intval($newdays);

$scripurl = "http://".$_SERVER["HTTP_HOST"].":".$_SERVER["SERVER_PORT"]. str_replace($scriptname, "", $PHP_SELF);
$scripurl2 = str_replace($scriptname, "viewnews.php", $PHP_SELF);
$scripfile = str_replace($scriptname, "", $_SERVER["PATH_TRANSLATED"]);
$scripfile = preg_replace("/\\\\/","/",$scripfile);
$scripfile = preg_replace("/\/\//","/",$scripfile);

$scripurl = preg_replace("/:80/","",$scripurl);

include("./viewnews.php");

// To mark domain.com the same as www.domain.com
$temp1 = $base_url;
$temp2 = $scripurl;
$base_url = preg_replace("/(www\.?)(.*)/i","$2",$base_url);
$scripurl = preg_replace("/(www\.?)(.*)/i","$2",$scripurl);


if ($scripurl != $base_url || $scripfile != $base_dir)
	$error = $lng["mustset"]."<br />\$base_dir = \"$scripfile\";<br />\$base_url = \"$scripurl\";";

// Change the variables back
$base_url = $temp1;
$scripurl = $temp2;

$scripurl .= "viewnews.php";
$scripfile .= "viewnews.php";

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
				<?php echo $SIDFORM."\n"; ?>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["genssi"]; ?></td></tr>
					<tr><td align="right"><?php echo $lng["cat"]; ?>&nbsp;</td><td align="center"><select name="ssicat">
<?php
	echo "\t\t\t\t\t<option value=\"0\">".$lng["allcat"]."</option>\n";
	$cataccess = explode("|",$_LOGIN["cataccess"]);
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` ORDER BY `cat_order` ASC");
	$count = 0;
	while ($row = mysql_fetch_object($query)) {
		if (in_array($row->cat_id,$cataccess) || $_LOGIN["cataccess"] == "") {
			$selected = ($ssicat == $row->cat_id) ? " selected" : "";
			echo "\t\t\t\t\t<option value=\"$row->cat_id\"$selected>$row->cat_name</option>\n";
			++$count;
			}
		}
	?>
					</select></td></tr>
					<tr><td align="right"><?php echo $lng["newsitems"]; ?>&nbsp;</td><td align="center"><input type="text" name="ssiitems" size="4" value="<?php echo $ssiitems; ?>" /></td></tr>
					<tr><td align="right"><?php echo $lng["newdays"]; ?>&nbsp;</td><td align="center"><input type="text" name="newdays" size="4" value="<?php echo $newdays; ?>" /></td></tr>
					<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["generate"]; ?>" /></td></tr>
				</table><br />
				</form>
				<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
					<tr><td class="header" colspan="2"><?php echo $lng["gendssi"]; ?></td></tr>
					<tr><td align="right">Direct Access&nbsp;</td><td align="center"><a href="<?php echo $scripurl; ?>?direct=1&amp;cat=<?php echo $ssicat; ?>&amp;limit=<?php echo $ssiitems; ?>&amp;newdays=<?php echo $newdays; ?>" target="_blank"><?php echo $scripurl; ?>?direct=1&amp;cat=<?php echo $ssicat; ?>&amp;limit=<?php echo $ssiitems; ?>&amp;newdays=<?php echo $newdays; ?></a></td></tr>
					<tr><td align="right">HTML SSI&nbsp;</td><td align="center">&lt;!--#include virtual="<?php echo $scripurl2; ?>?cat=<?php echo $ssicat; ?>&amp;limit=<?php echo $ssiitems; ?>&amp;newdays=<?php echo $newdays; ?>" --&gt;</td></tr>
					<tr><td align="right">PHP Includes (1)&nbsp;</td><td align="center">&lt;?php include("<?php echo $scripurl; ?>?cat=<?php echo $ssicat; ?>&amp;limit=<?php echo $ssiitems; ?>&amp;newdays=<?php echo $newdays; ?>"); ?></td></tr>
					<tr><td align="right">PHP Includes (2)&nbsp;</td><td align="left">&lt;?php<br /><br />$cat = "<?php echo $ssicat; ?>";<br />$limit = "<?php echo $ssiitems; ?>";<br />$newdays = "<?php echo $newdays; ?>";<br />include("<?php echo $scripfile; ?>");<br /><br />?></td></tr>
				</table>