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

// To prevent possible security risks
$IS_PANEWS = TRUE;

include("./config.php");
require("./lang/$lang.lng.php");

if (!$comments) {
	echo $lng["nocomments"];
	exit;
	}

include("./includes/functions.php");
include("./includes/database.php");

$mysql->connect();

extract($_GET);
extract($_POST);

if (!$newsid) {
	echo $lng["comnewsid"];
	exit;
	}

if ($showpost) {
	if ($showpost == "1") {
		$showpost = 1;
		} else {
		$showpost = 0;
		}
	}

if ($op == "num") {
	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_comments` WHERE `comment_nid` = '$newsid' AND `comment_approved` = '1';");
	echo mysql_num_rows($query);
	exit;
	}

if ($op == "dopost") {
	$myip = getenv("REMOTE_ADDR");
	if (!$myip)
		$myip = $_SERVER["REMOTE_ADDR"];
	$time = time();
	if ($topic && $post)
		mysql_query("INSERT INTO `".$mysql_prefix."_comments` VALUES('','$newsid','$name','$email','$website','$myip','$topic','$post','$time','$autoapprove');");
	if ($close)
		echo "<BODY onLoad=\"self.close()\">";
		else
		$op = "view";
	}

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("Y.m.d. - H:i") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <title>T R E M U L O U S - Hungary</title>
    <link rel="stylesheet" type="text/css" href="../styles/primary.css" title="Primary">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
       <script type="text/javascript">
    <!--    //Preload Images for MouseOver
    news = new Image();
    news.src = "../images/menu-news-down.jpg";
    about = new Image();
    about.src = "../images/menu-about-down.jpg";
    shots = new Image();
    shots.src = "../images/menu-shots-down.jpg";
    files = new Image();
    files.src = "../images/menu-files-down.jpg";
    forum = new Image();
    forum.src = "../images/menu-forum-down.jpg";
    faq = new Image();
    faq.src = "../images/menu-faq-down.jpg";
    //Perform MouseOver
    function newsdown()
    {
     if (!document.images) return;
     document.news.src = "../images/menu-news-down.jpg";
    }
    function newsup()
    {
     if (!document.images) return;
     document.news.src = "../images/menu-news-up.jpg";
    }
    function aboutdown()
    {
     if (!document.images) return;
     document.about.src = "../images/menu-about-down.jpg";
    }
    function aboutup()
    {
     if (!document.images) return;
     document.about.src = "../images/menu-about-up.jpg";
    }
    function shotsdown()
    {
     if (!document.images) return;
     document.shots.src = "../images/menu-shots-down.jpg";
    }
    function shotsup()
    {
     if (!document.images) return;
     document.shots.src = "../images/menu-shots-up.jpg";
    }
    function filesdown()
    {
     if (!document.images) return;
     document.files.src = "../images/menu-files-down.jpg";
    }
    function filesup()
    {
     if (!document.images) return;
     document.files.src = "../images/menu-files-up.jpg";
    }
    function forumdown()
    {
     if (!document.images) return;
     document.forum.src = "../images/menu-forum-down.jpg";
    }
    function forumup()
    {     if (!document.images) return;
     document.forum.src = "../images/menu-forum-up.jpg";
    }
    function faqdown()
    {
     if (!document.images) return;
     document.faq.src = "../images/menu-faq-down.jpg";
    }
    function faqup()
    {
     if (!document.images) return;
     document.faq.src = "../images/menu-faq-up.jpg";
    }
    function bbcode() {
		alert("<?php echo $lng["cbboff"]; ?>: <?php if ($cbbb) { echo $lng["cbbb"]; } ?> <?php if ($cbbu) { echo $lng["cbbu"]; } ?> <?php if ($cbbi) { echo $lng["cbbi"]; } ?> <?php if ($cbbcolor) { echo $lng["cbbcolor"]; } ?> <?php if ($cbbalign) { echo $lng["cbbalign"]; } ?> <?php if ($cbbsize) { echo $lng["cbbsize"]; } ?> <?php if ($cbbimg) { echo $lng["cbbimg"]; } ?> <?php if ($cbbimg2) { echo $lng["cbbimg2"]; } ?> <?php if ($cbburl) { echo $lng["cbburl"]; } ?> <?php if ($cbburl2) { echo $lng["cbburl2"]; } ?> <?php if ($cbblink) { echo $lng["cbblink"]; } ?> <?php if ($cbblink2) { echo $lng["cbblink2"]; } ?>");
		}
    //-->
    </script>
  </head>
  <body>
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
      <tr>
        <td width="5%"></td>
        <td>
          <div align="center">
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
              <tr>
                <td class="titleleftside"></td>
                <td align="center">
                  <table width="700" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                      <td colspan="7"><img src="../images/menu-top.gif" border="0"
                      class="blockimage" alt=""></td>
                    </tr>
                    <tr>
                      <td><a href="../index.php"
                             onmouseover="newsdown()"
                             onmouseout="newsup()"><img
                             src="../images/menu-news-up.jpg" alt="HÍREK"
                             border="0" class="blockimage" name="news"></a></td>
                      <td><a href="../about.html"
                             onmouseover="aboutdown()"
                             onmouseout="aboutup()"><img
                             src="../images/menu-about-up.jpg" alt="SÚGÓ"
                             border="0" class="blockimage" name="about"></a></td>
                      <td><a href="../shots.html"
                             onmouseover="shotsdown()"
                             onmouseout="shotsup()"><img
                             src="../images/menu-shots-up.jpg" alt="KÉPEK"
                             border="0" class="blockimage" name="shots"></a></td>
                      <td><img src="../images/menu-tremulous.gif" alt="TREMULOUS"
                             class="blockimage" border="0"/></td>
                      <td><a href="../files.html"
                             onmouseover="filesdown()"
                             onmouseout="filesup()"><img
                             src="../images/menu-files-up.jpg" alt="FÁJLOK"
                             border="0" class="blockimage" name="files"></a></td>
                      <td><a href="#"
                             onmouseover="forumdown()"
                             onmouseout="forumup()"><img
                             src="../images/menu-forum-up.jpg" alt="FÓRUM"
                             border="0" class="blockimage" name="forum"></a></td>
                      <td><a href="../faq.html"
                             onmouseover="faqdown()"
                             onmouseout="faqup()"><img
                             src="../images/menu-faq-up.jpg" alt="GYIK"
                             border="0" class="blockimage" name="faq"></a></td>
                    </tr>
                    <tr>
                      <td colspan="7"><img src="../images/menu-bottom.gif" border="0" class="blockimage" alt=""></td>
                    </tr>
                  </table>
                </td>
                <td class="titlerightside"><div align="right"><a href="index.php"><font color="#bbbbbb" size="1">Bejelentkezés</font></a></div></td>
              </tr>
            </table>
          </div>
          <p>
          <table width="100%" cellspacing=0 cellpadding=0 border=0>
            <tr>
              <td class="content">
<!-- Hozzászólások részleg eleje -->
<?php

if ($op == "view") {
//	$template = "\t\t<tr><td><u><b>[topic]</b></u> posted by [emaillink][name]</a> [website] on [date]<br />[post]</td></tr>";
	$template = "\t\t<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"newsitem\">\n<tr>\n<td class=\"newsicon\">\n<img src=\"../images/comm.jpg\" class=\"blockimage\" alt=\" \">\n</td>\n<td class=\"headline\">\n<div class=\"commheadertext left\">[topic]</div>\n</td>\n<td class=\"headline\">\n<div class=\"commheadertext right\">[date]&nbsp;</div>\n</td>\n</tr>\n<tr>\n<td width=\"25px\">\n</td>\n<td class=\"content\" colspan=\"2\">\n<p>[post]<br />\n</td>\n</tr>\n<tr>\n<td width=\"25px\">\n</td>\n<td align=\"right\" colspan=\"2\">\n<i>[emaillink][name]</a>\n</i>\n</p>\n</td>\n</tr>\n</table>\n<br />\n";
	if (!$perpage)
		$perpage = 10;
	if (!$start)
		$start = 0;

	?>
<!--		<tr><td class="header"></?php echo $lng["comments"]; ?></td></tr>-->
<?php

	$query = mysql_query("SELECT * FROM `".$mysql_prefix."_comments` WHERE `comment_nid` = '$newsid' AND `comment_approved` = '1' LIMIT $start,$perpage;");

	while ($data = mysql_fetch_row($query)) {
		$temp = $template;

		if (!$data[2])
			$data[2] = $lng["anonymous"];
		if ($data[3]) {
			$emaillink = "<a href=\"mailto:$data[3]\">";
			} else {
			$emaillink = "<a>";
			}

		$post = $data[7];

		$post = preg_replace("/&/","&amp;",$post);
		$post = preg_replace("/</","&lt;",$post);
		$post = preg_replace("/>/","&gt;",$post);
		$post = preg_replace("/&amp;#369;/","û",$post);
		$post = preg_replace("/&amp;#337;/","õ",$post);
		$post = preg_replace("/&amp;#368;/","Û",$post);
		$post = preg_replace("/&amp;#336;/","Õ",$post);

	if (!$cbboff) {
			if ($cbbcolor) { $post = preg_replace("/\[color=(.*?)\](.*?)\[\/color\]/", "<font color=\"$1\">$2</font>", $post); }
			if ($cbbalign) { $post = preg_replace("/\[align=(left|center|right)\](.*?)\[\/align\]/", "<div align=\"$1\">$2</div>", $post); }
			if ($cbbsize) { $post = preg_replace("/\[size=(\-?)([0-5])\](.*?)\[\/size\]/", "<font size=\"$1$2\">$3</font>", $post); }
			if ($cbbsize) { $post = preg_replace("/\[size=(\-?)([0-9]+)\](.*?)\[\/size\]/", "<font size=\"$1"."5\">$3</font>", $post); }
			if ($cbbimg) { $post = preg_replace("/\[img=((http|https):(.*?))\/(([a-zA-Z0-9.-]+)(\.)(gif|jpg|jpeg|png))\]/","<a href=\"$1/$4\"><img src=\"$1/$4\" class=\"shotthumbnail\" alt=\"$4\"/></a>",$post); }
			if ($cbbimg2) { $post = preg_replace("/\[img\](.*?)\[\/img\]/","<a href=\"$1\"><img src=\"$1\" class=\"shotthumbnail\" alt=\"$1\"/></a>",$post); }
			if ($cbbb) { $post = preg_replace("/\[b\](.*?)\[\/b\]/", "<b>$1</b>", $post); }
			if ($cbbi) { $post = preg_replace("/\[i\](.*?)\[\/i\]/", "<i>$1</i>", $post); }
			if ($cbbu) { $post = preg_replace("/\[u\](.*?)\[\/u\]/", "<u>$1</u>", $post); }
			if ($cbblink) { $post = preg_replace("/\[link=((((ftp|ftps|http|https|irc):(\/\/?))|(www\.))([\w\.-]+)([\/\w+\.]+))\](.*?)\[\/link\]/", "<a href=\"$4:$5$6$7$8\" target=\"_new\">$9</a>",$post); }
			if ($cbblink2) { $post = preg_replace("/\[link\](.*?)\[\/link\]/", "<a href=\"$1\" target=\"_new\">$1</a>",$post); }
			if ($cbburl) { $post = preg_replace("/\[url=((((ftp|ftps|http|https|irc):(\/\/?))|(www\.))([\w\.-]+)([\/\w+\.]+))\](.*?)\[\/url\]/", "<a href=\"$4:$5$6$7$8\" target=\"_new\">$9</a>",$post); }
			if ($cbburl2) { $post = preg_replace("/\[url\](.*?)\[\/url\]/", "<a href=\"$1\" target=\"_new\">$1</a>",$post); }
		}


		$post = preg_replace("/\[\[\]/i", "[", $post);

		$post = preg_replace("/\r/","",$post);
		$post = preg_replace("/\n/","<br />\n",$post);

		$data[2] = preg_replace("/</","&lt;",$data[2]);
		$data[2] = preg_replace("/>/","&gt;",$data[2]);
		$data[3] = preg_replace("/</","&lt;",$data[3]);
		$data[3] = preg_replace("/>/","&gt;",$data[3]);
		$data[4] = preg_replace("/</","&lt;",$data[4]);
		$data[4] = preg_replace("/>/","&gt;",$data[4]);
		$data[6] = preg_replace("/</","&lt;",$data[6]);
		$data[6] = preg_replace("/>/","&gt;",$data[6]);

		$temp = preg_replace("/\[name\]/i",$data[2],$temp);
		$temp = preg_replace("/\[email\]/i",$data[3],$temp);
		$temp = preg_replace("/\[emaillink\]/i",$emaillink,$temp);
		$temp = preg_replace("/\[website\]/i","<a href=\"$data[4]\">$data[4]</a>",$temp);
		$temp = preg_replace("/\[topic\]/i",$data[6],$temp);
		$temp = preg_replace("/\[post\]/i",$post,$temp);
		$temp = preg_replace("/\[timestamp\]/i",$data[8],$temp);
		$temp = preg_replace("/\[date\]/i",date("Y.m.d. - H:i", $data[8]),$temp);

		echo $temp;
		}

?>
<!--			<tr><td class="header" colspan="2"></?php echo $lng["postcom"]; ?></td></tr>-->
<!--<td align="right" width="50%"></?php echo $lng["weburl"]; ?></td><td width="50%"><input type="text" name="website" value="" />-->
<!-- <a href="http://tremulous.net><img class="statics" src="tlogo.gif" width="88" height="31" alt="SourceForge Logo"> -->
<!--
<br>
<p class="center">
 <a href="index.htm">&gt&gt;</a>
</p>
-->
	<?php

	if ($showpost) {
		$op = "post";
		$close = "0";
		}
	}

if ($op == "post") {
?>

<h1><?php echo $lng["postcom"]; ?><hr align="left" size="3" width="85%"></h1>
	<form method="post" action="<?php echo $PHP_SELF; ?>">
		<input type="hidden" name="op" value="dopost" />
		<input type="hidden" name="newsid" value="<?php echo $newsid; ?>" />
		<input type="hidden" name="close" value="<?php echo $close; ?>" />
		<input type="hidden" name="showpost" value="<?php echo $showpost; ?>" />
		<table border="0">
		    <tr>
			  <td><b><?php echo $lng["name"]; ?></b></td>
			  <td><input type="text" name="name" value="" maxlength="24" size="26" /></td>
			</tr>
			<tr>
			  <td><b><?php echo $lng["email"]; ?></b></td>
			  <td><input type="text" name="email" value="" maxlength="32" size="26" /></td>
			</tr>
			<tr>
			  <td><b><?php echo $lng["title"]; ?><font size="3" color="red">*</font></b></td>
			  <td><input type="text" name="topic" value="" maxlength="40" size="44" /></td>
			</tr>
			<tr>
			  <td colspan="2"><textarea name="post" rows="5" cols="60"></textarea></td>
			</tr>
			<tr>
			  <td><input type="submit" value="<?php echo $lng["postcomm"]; ?>" /></td>
			  <td align="right"><?php if (!$cbboff) { ?><input type="button" value="<?php echo $lng["bbcode"]; ?>" onClick='bbcode()'><?php } ?></td>
			</tr>
		</table>
		</form>
	<?php
	}

else {
?>
<br>
<form  method="get" action="<?php echo $PHP_SELF; ?>" />
<input type="hidden" name="op" value="view" />
<input type="hidden" name="newsid" value="<?php echo $newsid; ?>" />
<input type="hidden" name="showpost" value="1" />
<input type="submit" value="<?php echo $lng["postcom"]; ?>" /></form>
	<?php
	}

?>
<!-- Hozzászólások részleg vége -->
    <div align="center">
	<br>
    <a href="http://tremulous.net">
    <img src="../images/tlogo.gif" width="166" height="30" alt="TREMULOUS.NET">
    </a>
    </div>

             </td>
            </tr>
          </table>
        </td>
        <td width="5%"></td>
      </tr>
    </table>
	</body>
</html>