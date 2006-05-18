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

class panews {
	function redirect($url) {
		?>
<meta http-equiv="refresh" content="0; URL=<?php echo $url ?>" />
		<?php
		}

	// Idea based from http://www.happysnax.com.au/testemail.php

	function encode_email($email,$name,$tabs=0) {
		$tabins="";
		for ($x=0;$x<$tabs;$x++) {
			$tabins .= "\t";
			}
		$email = preg_replace("/\"/","\\\"",$email);
		$old = "document.write('<a href=\"mailto:$email\">$name</a>')";

		$output = "";

		for ($i=0; $i < strlen($old); $i++) {
			$output = $output . '%' . bin2hex(substr($old,$i,1));
			}

		return "$tabins<script language=\"JavaScript\" type=\"text/javascript\">\r\n$tabins\t<!--\r\n$tabins\teval(unescape('".$output."'))\r\n$tabins\t//-->\r\n$tabins</script>";
		}
	function encode_html($html,$tabs=0) {
		$tabins="";
		for ($x=0;$x<$tabs;$x++) {
			$tabins .= "\t";
			}

		$html = preg_replace("/\"/","\\\"",$html);
		$old = "document.write('$html')";

		$output = "";

		for ($i=0; $i < strlen($old); $i++) {
			$output = $output . '%' . bin2hex(substr($old,$i,1));
			}

		return "$tabins<script language=\"JavaScript\" type=\"text/javascript\">\r\n$tabins\t<!--\r\n$tabins\teval(unescape('".$output."'))\r\n$tabins\t//-->\r\n$tabins</script>";
		}
	}
$panews = new panews;

?>