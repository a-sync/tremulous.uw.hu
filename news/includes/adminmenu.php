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

$access = explode("|",$_LOGIN["access"]);

$user_access = array();
$user_access["cat"] = 1;
$user_access["newsadd"] = 1;
$user_access["newsedit"] = 1;
$user_access["comment"] = 1;
$user_access["admins"] = 1;
$user_access["prefset"] = 1;
$user_access["setup"] = 1;

$cat = array();
$items = array();
$cati = -1;

$cati++;
$cat[$cati] = $menulng["catman"];
$item[$cati] = array();

if (in_array("cat",$access)) {
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=category&amp;panel=add&amp;$SIDLINK\">$lng[add]</a>";
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=category&amp;panel=edit&amp;$SIDLINK\">$lng[edit]</a>";
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=category&amp;panel=delete&amp;$SIDLINK\">$lng[delete]</a>";
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=category&amp;panel=reorder&amp;$SIDLINK\">$lng[reorder]</a>";
	}

$cati++;
$cat[$cati] = $menulng["newsman"];
$item[$cati] = array();

if (in_array("newsadd",$access)) {
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=news&amp;panel=add&amp;$SIDLINK\">$lng[add]</a>";
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=news&amp;panel=edit&amp;$SIDLINK\">$lng[edit]</a>";
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=news&amp;panel=delete&amp;$SIDLINK\">$lng[delete]</a>";
	}

$cati++;
$cat[$cati] = $menulng["comment"];
$item[$cati] = array();

if (in_array("comment",$access)) {
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=comment&amp;panel=edit&amp;$SIDLINK\">$lng[edit]</a>";
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=comment&amp;panel=delete&amp;$SIDLINK\">$lng[delete]</a>";
	}

$cati++;
$cat[$cati] = $menulng["adminman"];
$item[$cati] = array();

if (in_array("admins",$access)) {
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=admins&amp;panel=add&amp;$SIDLINK\">$lng[add]</a>";
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=admins&amp;panel=edit&amp;$SIDLINK\">$lng[edit]</a>";
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=admins&amp;panel=delete&amp;$SIDLINK\">$lng[delete]</a>";
	}

$cati++;
$cat[$cati] = $menulng["utilman"];
$item[$cati] = array();

if (in_array("setup",$access))
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=setup&amp;$SIDLINK\">$lng[paset]</a>";
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=genssi&amp;$SIDLINK\">$lng[genssi]</a>";
if (in_array("prefset",$access))
$item[$cati][] = "<a href=\"$scriptname?action=admin&amp;op=prefs&amp;$SIDLINK\">$lng[yacct]</a>";

?>
				<table border="0" cellpadding="0" cellspacing="2" width="100%">
<?php

$output = 0;
foreach ($cat as $key => $value) {
	if (count($item[$key])) {
		echo "\t\t\t\t\t<tr><td class=\"header\">$value</td></tr>\n";
		foreach ($item[$key] as $key2 => $value2) {
			$output++;
			echo "\t\t\t\t\t<tr><td align=\"center\">$value2</td></tr>\n";
			}
		}
	}

if (!$output)
	echo "\t\t\t\t\t<tr><td align=\"center\" align=\"center\"><b>".$lng["noop"]."</b></td></tr>\n";

?>
				</table>
