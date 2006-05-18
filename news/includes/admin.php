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

?>
	<table align="center" border="0" width="100%">
		<tr>
			<td class="header" colspan="2"><?php echo $lng["adminmode"]; ?></td>
		</tr><tr>
			<td align="left"><a href="../index.php"><?php echo $lng["mainsite"]; ?></a> :: <a href="<?php echo $scriptname; ?>?action=admin&amp;<?php echo $SIDLINK; ?>"><?php echo $lng["admincenter"]; ?></a></td>
			<td align="right"><?php echo $lng["loginas"]; ?> <b><?php echo $_LOGIN["username"]; ?></b> <?php echo $lng["namein"]; ?> <b>[</b> <a href="<?php echo $scriptname; ?>?action=logoff"><?php echo $lng["logout"]; ?></a> <b>]</b></td>
		</tr>
	</table>
	<table align="center" border="0" width="100%">
		<tr>
			<td align="center" valign="top" width="200px">
<?php include ("./includes/adminmenu.php") ?>
			</td><td align="left" valign="top">
<?php
	if (!$op || !file_exists("./includes/admin_$op.php"))
		$op = "main";

	include ("./includes/admin_$op.php");
?>
		</td>
		</tr>
	</table>
