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
			Üdvözöllek paNews <?php echo $version; ?>_vec Admin Centerében!<br><br>
			<b>99%-os az egész motor</b>, és ebben benne van a magyarítás egy óriási mértékû hibajavítás és<br>
			a funkcók magas szintû bõvítése is.<br>
			A maradék 1% az a hiba lehet amit nem vettem észre :)<br><br>
			Bal oldalon, a jogaidnak megfelelõ paneleket láthatod. Kevés próbálkozással hamar<br>
			kiismerheted õket hiszen nagyon egyszerûek.<br><br>
			&copy; 2006 Vector Akashi<br><br><br>
		<table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
			<tr><td class="header" colspan="2"><?php echo $lng["upsets"]; ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["newsitems"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$limit) { echo $lng["all"]; } else { echo $limit; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["newdays"]; ?>&nbsp;</td><td align="center" width="50%"><?php echo $newdays; ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["lang"]; ?>&nbsp;</td><td align="center" width="50%"><?php echo $lang; ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["version"]; ?>&nbsp;<?php echo $lng["update"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$disvercheck) { echo $lng["yes"]; } else { echo $lng["no"]; } ?></td></tr>
			<tr><td class="header" colspan="2"><?php echo $lng["comments"]; ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["alcom"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$comment) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["autoapprove"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$autoapprove) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["showpost"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$showpost) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["perpage"]; ?>&nbsp;</td><td align="center" width="50%"><?php echo $perpage; ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbboff"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbboff) { echo $lng["yes"]; } else { echo $lng["no"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbbb"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbbb) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbbu"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbbu) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbbi"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbbi) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbbcolor"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbbcolor) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbbalign"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbbalign) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbbsize"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbbsize) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbbimg"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbbimg) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbbimg2"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbbimg2) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbburl"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbburl) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbburl2"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbburl2) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbblink"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbblink) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["cbblink2"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (!$cbblink2) { echo $lng["no"]; } else { echo $lng["yes"]; } ?></td></tr>
			<tr><td class="header" colspan="2"><?php echo $lng["sysinfo"]; ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["version"]; ?>&nbsp;</td><td align="center" width="50%"><?php echo $version; ?></td></tr>
			<tr><td align="right" width="50%"><?php echo $lng["confiswrit"]; ?>&nbsp;</td><td align="center" width="50%"><?php if (is_writable("./config.php")) { echo $lng["yes"]; } else { echo $lng["no"]; } ?></td></tr>

		</table>
			<p align="center">
			<?php echo $panews->encode_html("<i>Ha bármilyen hibát észlelsz, feltétlen szólj nekem (Vector) vagy írj egy e-mailt a <a href=\"mailto:vector.akashi@gmail.com\">vector.akashi@gmail.com</a> címre.</i>",3); ?>
			</p>