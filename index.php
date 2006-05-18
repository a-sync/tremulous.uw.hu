<?php

$base_dir = "/mnt/ultraweb/t/tr/tremulous/news/";
$base_url = "http://tremulous.uw.hu/";

if (!$IS_PANEWS) {
$IS_PANEWS = 1;
include_once($base_dir . "config.php");
include_once($base_dir . "includes/database.php");
include_once($base_dir . "includes/functions.php");
$mysql->connect();
extract($_GET);

if (!$limit)
	$limit = 5;
if (!$newdays)
	$newdays = 1;
if ($cat) {
	$where = " WHERE `news_catid` = '$cat'";

// Check linked categories too
$query = mysql_query("SELECT * FROM `".$mysql_prefix."_cat` WHERE `cat_link` = '$cat'");
while ($row = mysql_fetch_row($query)) {
	$where .= " OR `news_catid` = '$row[0]'";
	}
	}

if (!$template)
	$template = "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"newsitem\">\n<tr>\n<td class=\"newsicon\">\n<a href=\"index.php?cat=<catid>&limit=0&newdays=$newdays\">\n<img src=\"images/cat_<catid>.jpg\" class=\"blockimage\" alt=\" \">\n</a>\n</td>\n<td class=\"headline\">\n<div class=\"newsheadertext left\"><new> <font color=\"#ff0000\">&Uacute;J!</font> </new><title></div>\n</td>\n<td class=\"headline\">\n<div class=\"newsheadertext right\"><date>&nbsp;</div>\n</td>\n</tr>\n<tr>\n<td width=\"25px\">\n</td>\n<td class=\"content\" colspan=\"2\">\n<p><news><br />\n</td>\n</tr>\n<tr>\n<td width=\"25px\">\n</td>\n<td align=\"left\">\n<ifcomment><commentsurl>Hozzászólások: <comments></a></ifcomment>\n</td>\n<td align=\"right\">&Iacute;rta: <authemaillink><authname></a>\n</p>\n</td>\n</tr>\n</table>\n<br />\n";

// Allow this file to be used directly.

$tempx = "http://".$_SERVER["HTTP_HOST"].":".$_SERVER["SERVER_PORT"]. str_replace($scriptname, "", $PHP_SELF);
$tempx = preg_replace("/:80/","",$tempx);

if ($base_url."index.php" == $tempx || $_GET["direct"] == 1)
	$isself = 1;
	else
	$isself = 0;

if ($isself) {
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
    <link rel="stylesheet" type="text/css" href="styles/primary.css" title="Primary">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
       <script type="text/javascript">
    <!--    //Preload Images for MouseOver
    news = new Image();
    news.src = "images/menu-news-down.jpg";
    about = new Image();
    about.src = "images/menu-about-down.jpg";
    shots = new Image();
    shots.src = "images/menu-shots-down.jpg";
    files = new Image();
    files.src = "images/menu-files-down.jpg";
    forum = new Image();
    forum.src = "images/menu-forum-down.jpg";
    faq = new Image();
    faq.src = "images/menu-faq-down.jpg";
    //Perform MouseOver
    function newsdown()
    {
     if (!document.images) return;
     document.news.src = "images/menu-news-down.jpg";
    }
    function newsup()
    {
     if (!document.images) return;
     document.news.src = "images/menu-news-up.jpg";
    }
    function aboutdown()
    {
     if (!document.images) return;
     document.about.src = "images/menu-about-down.jpg";
    }
    function aboutup()
    {
     if (!document.images) return;
     document.about.src = "images/menu-about-up.jpg";
    }
    function shotsdown()
    {
     if (!document.images) return;
     document.shots.src = "images/menu-shots-down.jpg";
    }
    function shotsup()
    {
     if (!document.images) return;
     document.shots.src = "images/menu-shots-up.jpg";
    }
    function filesdown()
    {
     if (!document.images) return;
     document.files.src = "images/menu-files-down.jpg";
    }
    function filesup()
    {
     if (!document.images) return;
     document.files.src = "images/menu-files-up.jpg";
    }
    function forumdown()
    {
     if (!document.images) return;
     document.forum.src = "images/menu-forum-down.jpg";
    }
    function forumup()
    {     if (!document.images) return;
     document.forum.src = "images/menu-forum-up.jpg";
    }
    function faqdown()
    {
     if (!document.images) return;
     document.faq.src = "images/menu-faq-down.jpg";
    }
    function faqup()
    {
     if (!document.images) return;
     document.faq.src = "images/menu-faq-up.jpg";
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
                      <td colspan="7"><img src="images/menu-top.gif" border="0"
                      class="blockimage" alt=""></td>
                    </tr>
                    <tr>
                      <td><a href="index.php"
                             onmouseover="newsdown()"
                             onmouseout="newsup()"><img
                             src="images/menu-news-up.jpg" alt="HÍREK"
                             border="0" class="blockimage" name="news"></a></td>
                      <td><a href="about.html"
                             onmouseover="aboutdown()"
                             onmouseout="aboutup()"><img
                             src="images/menu-about-up.jpg" alt="SÚGÓ"
                             border="0" class="blockimage" name="about"></a></td>
                      <td><a href="shots.html"
                             onmouseover="shotsdown()"
                             onmouseout="shotsup()"><img
                             src="images/menu-shots-up.jpg" alt="KÉPEK"
                             border="0" class="blockimage" name="shots"></a></td>
                      <td><img src="images/menu-tremulous.gif" alt="TREMULOUS"
                             class="blockimage" border="0"/></td>
                      <td><a href="files.html"
                             onmouseover="filesdown()"
                             onmouseout="filesup()"><img
                             src="images/menu-files-up.jpg" alt="FÁJLOK"
                             border="0" class="blockimage" name="files"></a></td>
                      <td><a href="#"
                             onmouseover="forumdown()"
                             onmouseout="forumup()"><img
                             src="images/menu-forum-up.jpg" alt="FÓRUM"
                             border="0" class="blockimage" name="forum"></a></td>
                      <td><a href="faq.html"
                             onmouseover="faqdown()"
                             onmouseout="faqup()"><img
                             src="images/menu-faq-up.jpg" alt="GYIK"
                             border="0" class="blockimage" name="faq"></a></td>
                    </tr>
                    <tr>
                      <td colspan="7"><img src="images/menu-bottom.gif" border="0" class="blockimage" alt=""></td>
                    </tr>
                  </table>
                </td>
                <td class="titlerightside"><div align="right"><a href="./news/index.php"><font color="#bbbbbb" size="1">Bejelentkezés</font></a></div></td>
              </tr>
            </table>
          </div>
          <p>
          <table width="100%" cellspacing=0 cellpadding=0 border=0>
            <tr>
              <td class="content">
<!-- Hirek részleg eleje -->
<?php
	}

$query = mysql_query("SELECT * FROM `".$mysql_prefix."_news`$where ORDER BY `news_id` DESC  LIMIT 0 , $limit");

if (mysql_num_rows($query) > 0) {
while ($news = mysql_fetch_object($query)) {
	$temp = $template;

	if ($comments) {
		$temp = preg_replace("/<ifcomment>(.*)<\/ifcomment>/","$1",$temp);
		} else {
		$temp = preg_replace("/<ifcomment>(.*)<\/ifcomment>/","",$temp);
		}

	$query2 = mysql_query("SELECT * FROM `".$mysql_prefix."_auth` WHERE `auth_id` = '$news->news_auth_id';");
	$data = mysql_fetch_row($query2);

	$postername = $data[1];
	$posteremail = $data[3];

	// This will encode the email address so that spambots cannot pick it up
	// If you do not want this simply replace the next line with:
	// $emaillink = $posteremail ? "<a href=\"mailto:$posteremail\">" : "<a>";
	$emaillink = $posteremail ? $panews->encode_html("<a href=\"mailto:$posteremail\">") : "<a>";

	$date = date("Y.m.d. - H:i ", $news->news_start);

	$news2 = $news->news_news;

	if ($news->news_start < time() - ($newdays * 24 * 60 * 60)) {
		$temp = preg_replace("/<new>(.*)<\/new>/","",$temp);
		} else {
		$temp = preg_replace("/<new>(.*)<\/new>/","$1",$temp);
		}

	$news2 = preg_replace("/&/","&amp;",$news2);
	$news2 = preg_replace("/</","&lt;",$news2);
	$news2 = preg_replace("/>/","&gt;",$news2);
	$news2 = preg_replace("/&amp;#369;/","û",$news2);
	$news2 = preg_replace("/&amp;#337;/","õ",$news2);
	$news2 = preg_replace("/&amp;#368;/","Û",$news2);
	$news2 = preg_replace("/&amp;#336;/","Õ",$news2);

	$news2 = preg_replace("/\[color=(.*?)\](.*?)\[\/color\]/", "<font color=\"$1\">$2</font>", $news2);
	$news2 = preg_replace("/\[align=(left|center|right)\](.*?)\[\/align\]/", "<div align=\"$1\">$2</div>", $news2);
	$news2 = preg_replace("/\[size=(\-?)([0-5])\](.*?)\[\/size\]/", "<font size=\"$1$2\">$3</font>", $news2);
	$news2 = preg_replace("/\[size=(\-?)([0-9]+)\](.*?)\[\/size\]/", "<font size=\"$1"."5\">$3</font>", $news2);
	$news2 = preg_replace("/\[img=((http|https):(.*?))\/(([a-zA-Z0-9.-]+)(\.)(gif|jpg|jpeg|png))\]/","<img src=\"$1/$4\" class=\"shotthumbnail\" alt=\"$4\"/>",$news2);
	$news2 = preg_replace("/\[img\](.*?)\[\/img\]/","<img src=\"$1\" class=\"shotthumbnail\" alt=\"$1\"/>",$news2);
	$news2 = preg_replace("/\[b\](.*?)\[\/b\]/", "<b>$1</b>", $news2);
	$news2 = preg_replace("/\[i\](.*?)\[\/i\]/", "<i>$1</i>", $news2);
	$news2 = preg_replace("/\[u\](.*?)\[\/u\]/", "<u>$1</u>", $news2);

	$news2 = preg_replace("/\[link=((((ftp|ftps|http|https|irc):(\/\/?))|(www\.))([\w\.-]+)([\/\w+\.]+))\](.*?)\[\/link\]/", "<a href=\"$4:$5$6$7$8\" target=\"_blank\">$9</a>",$news2);
	$news2 = preg_replace("/\[link\](.*?)\[\/link\]/", "<a href=\"$1\" target=\"_blank\">$1</a>",$news2);
	$news2 = preg_replace("/\[url=((((ftp|ftps|http|https|irc):(\/\/?))|(www\.))([\w\.-]+)([\/\w+\.]+))\](.*?)\[\/url\]/", "<a href=\"$4:$5$6$7$8\" target=\"_blank\">$9</a>",$news2);
	$news2 = preg_replace("/\[url\](.*?)\[\/url\]/", "<a href=\"$1\" target=\"_blank\">$1</a>",$news2);

	$news2 = preg_replace("/\[\[\]/", "[", $news2);

	$news2 = preg_replace("/\r/","",$news2);
	$news2 = preg_replace("/\n/","<br />\n",$news2);

	$query3 = mysql_query("SELECT * FROM `".$mysql_prefix."_comments` WHERE `comment_nid` = '$news->news_id' AND `comment_approved` = '1';");
	$comments2 = mysql_num_rows($query3);
	$commentsurl = "<a href=\"".$base_url."news/comments.php?op=view&amp;newsid=$news->news_id&amp;showpost=$showpost\">";

	$temp = preg_replace("/<id>/i",$news->news_id,$temp);
	$temp = preg_replace("/<catid>/i",$news->news_catid,$temp);
	$temp = preg_replace("/<comments>/i",$comments2,$temp);
	$temp = preg_replace("/<commentsurl>/i",$commentsurl,$temp);
	$temp = preg_replace("/<authid>/i",$news->news_auth_id,$temp);
	$temp = preg_replace("/<authname>/i",$postername,$temp);
	$temp = preg_replace("/<authemail>/i",$posteremail,$temp);
	$temp = preg_replace("/<authemaillink>/i",$emaillink,$temp);
	$temp = preg_replace("/<title>/i",$news->news_title,$temp);
	$temp = preg_replace("/<news>/i",$news2,$temp);
	$temp = preg_replace("/<timestamp>/i",$news->news_start,$temp);
	$temp = preg_replace("/<date>/i",$date,$temp);
	echo $temp;
	}
	}
	}

if ($isself) {
?>
<!-- Hirek részleg vége -->
    <div align="center">
  
    <a href="http://tremulous.net">
    <img src="images/tlogo.gif" width="166" height="30" alt="TREMULOUS.NET">
    </a>
    </div>

<!-- <a href="http://tremulous.net><img class="statics" src="tlogo.gif" width="88" height="31" alt="SourceForge Logo"> -->
<!--
<br>
<p class="center">
 <a href="index.htm">&gt&gt;</a>
</p>
-->
              </td>
            </tr>
          </table>
        </td>
        <td width="5%"></td>
      </tr>
    </table>

  </body>
</html>
<?php
	}
?>