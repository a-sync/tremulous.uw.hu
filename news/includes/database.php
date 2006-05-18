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

class mysql {
	function connect() {
		global $mysql_host,$mysql_username,$mysql_password,$mysql_database;

		/*
		The p before connect means 'persistant'. It will greatly
		speed up your news engine. If this does not work, remove
		the p
		*/
		mysql_pconnect($mysql_host,$mysql_username,$mysql_password) || die(mysql_error());
		mysql_select_db($mysql_database) || die(mysql_error());
		}
	}
$mysql = new mysql;

?>