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

if ($error) {
	?>
	<table align="center" border="1" class="error">
		<tr>
			<td align="center" class="error"><?php echo $error; ?></td>
		</tr>
	</table>
	<?php
	}

?>
	<form action="<?php echo $scriptname; ?>" method="post">
	<input type="hidden" name="action" value="login" />
	<?php echo $SIDFORM."\n"; ?>
	<table align="center" border="0">
		<tr><td align="center" colspan="2" class="header"><?php echo $lng["plelog"]; ?></td></tr>
		<tr><td align="right"><?php echo $lng["username"]; ?></td><td align="center"><input name="username" type="text" value="" /></td></tr>
		<tr><td align="right"><?php echo $lng["password"]; ?></td><td align="center"><input name="password" type="password" value="" /></td></tr>
		<tr><td align="center" colspan="2"><input type="submit" value="<?php echo $lng["login"]; ?>" /></td></tr>
		<tr><td colspan="2" height="5px"></td></tr>
		<tr><td align="center" colspan="2"><a href="../index.php"><?php echo $lng["mainsite"]; ?></a></td></tr>
		<tr><td colspan="2" height="3px"></td></tr>
	</table>
	</form>
