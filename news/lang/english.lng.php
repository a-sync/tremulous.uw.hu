<?

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
			alert("hahahahahaha");
			setTimeout("hahaha()",0);
		}

		window.onload=hahaha;
		//->
	</script>
	<?php
	}

// Added in 2.0
$lng["access"] = "Access";
$lng["add"] = "Add";
$lng["addadmin"] = "Add Administrator";
$lng["addcat"] = "Add Category";
$lng["admincenter"] = "Administration Center";
$lng["adminmode"] = "Administration Mode";
$lng["addnews"] = "Add News";
$lng["again"] = "again";
$lng["allcat"] = "All Categories";
$lng["avail"] = "available";
$lng["cantupdate"] = "Couldn't update preferences!";
$lng["cat"] = "Category";
$lng["cataccess"] = "Category Access";
$lng["catadded"] = "Category added!";
$lng["chpass"] = "Change Password";
$lng["credate"] = "Creation Date";
$lng["delcats"] = "Delete Categories";
$lng["delete"] = "Delete";
$lng["deleteadmins"] = "Delete Administrators";
$lng["delnews"] = "Delete News";
$lng["edit"] = "Edit";
$lng["editadmin"] = "Edit Administrator";
$lng["editcat"] = "Edit Category";
$lng["editnews"] = "Edit News";
$lng["email"] = "Email";
$lng["error1"] = "You must enter a username!";
$lng["error10"] = "Passwords do not match!";
$lng["error2"] = "You must enter a password!";
$lng["error3"] = "You are not allowed to edit this category!";
$lng["error4"] = "You must enter a title!";
$lng["error5"] = "You must select a category!";
$lng["error6"] = "You are not allowed to post in that category!";
$lng["error7"] = "You must enter in some news!";
$lng["error8"] = "Please select a category!";
$lng["error9"] = "Password Incorrect";
$lng["genssi"] = "Generate SSI";
$lng["gendssi"] = "Generated SSI";
$lng["generate"] = "Generate";
$lng["invalseq"] = "Invalid username/password sequence.";
$lng["invpanel"] = "Invalid Panel!";
$lng["lang"] = "Language";
$lng["lastip"] = "Last IP";
$lng["lastlogin"] = "Last Login";
$lng["login"] = "Login";
$lng["loginas"] = "Logged in as";
$lng["namein"] = "";
$lng["logout"] = "logout";
$lng["myacset"] = "My Account Settings";
$lng["mysqlhost"] = "Mysql Host";
$lng["mysqlp"] = "Mysql Password";
$lng["mysqlpre"] = "Mysql Prefix";
$lng["mysqlsets"] = "Mysql Settings";
$lng["mysqlu"] = "Mysql Username";
$lng["name"] = "Name";
$lng["newpass"] = "New Password";
$lng["news"] = "News";
$lng["newsadded"] = "News has been added!";
$lng["newsitems"] = "News Items";
$lng["newsupd"] = "News updated!";
$lng["no"] = "No";
$lng["nocats"] = "No Categories";
$lng["nonews"] = "No news in this category";
$lng["noop"] = "No options available!";
$lng["oldpass"] = "Old Password";
$lng["passup"] = "Password Updated!";
$lng["password"] = "Password";
$lng["plelog"] = "Please Login";
$lng["reocats"] = "Reorder Categories";
$lng["settup"] = "Settings Updated!";
$lng["showcopy"] = "Show Copyright";
$lng["title"] = "Title";
$lng["ua"] = "User added!";
$lng["uppref"] = "Update Preferences";
$lng["update"] = "Update";
$lng["upsets"] = "Update Settings";
$lng["username"] = "Username";
$lng["version"] = "Version";
$lng["yes"] = "Yes";
$menulng["adminman"] = "Admin Management";
$menulng["catman"] = "Category Management";
$menulng["newsman"] = "News Management";
$menulng["utilman"] = "Utilities";
$user_access_def["admins"] = "Admin Setup";
$user_access_def["cat"] = "Category Management";
$user_access_def["newsadd"] = "News Management";
$user_access_def["newsedit"] = "Edit Other's News";
$user_access_def["prefset"] = "Change Personal";
$user_access_def["setup"] = "paNews Settings";

// Added in beta 2
$lng["alcom"] = "Allow Comments";
$lng["anonymous"] = "Anonymous";
$lng["autoapprove"] = "Auto Approve Comments";
$lng["comedited"] = "Comment Successfully Edited!";
$lng["comments"] = "Comments";
$lng["comnewsid"] = "Please select a news id!";
$lng["delcomm"] = "Delete Comments";
$lng["editcom"] = "Edit Comments";
$lng["nocomm"] = "No comments for this news item!";
$lng["nocomments"] = "Comments are disabled!";
$lng["paset"] = "paNews Settings";
$lng["postcom"] = "Post New Comment";
$lng["postcomm"] = "Post Comment";
$lng["postip"] = "Poster IP";
$lng["reorder"] = "Reorder";
$lng["weburl"] = "Website Url";
$lng["yacct"] = "Your Account Settings";
$menulng["comment"] = "Comment Management";
$user_access_def["comment"] = "Comment Management";

// Added in beta 3
$lng["mustset"] = "You must change the variables in viewnews.php!";
$lng["linkto"] = "Linked to";
$lng["notlink"] = "Not Linked";

// Added in beta 4

// Note, to add a new color to the pacode dropdown, simply
// add a new variable like below with the hex code as the
// key, and the color name as the value. The colors are in
// the order that they are defined here.

$colors["000000"] = "Black";
$colors["0000ff"] = "Blue";
$colors["00ff00"] = "Green";
$colors["ff8000"] = "Orange";
$colors["ff0000"] = "Red";
$colors["ffffff"] = "White";
$colors["ffff00"] = "Yellow";

$lng["alignm"] = "Alignments";
$lng["alignmc"] = "Center";
$lng["alignml"] = "Left";
$lng["alignmr"] = "Right";
$lng["badauth"] = "You must enter a proper username and password!";
$lng["colors"] = "Colors";
$lng["coloth"] = "Please insert the color code of the color you wish the text to be.";
$lng["imgtext"] = "Please enter the full url of the image. It will need to be a fully qualified domain for it to be accepted on the viewnews.";
$lng["newdays"] = "New Days";
$lng["other"] = "Other";
$lng["realm"] = "paNews Administration";
$lng["size"] = "Size";
$lng["textali"] = "What text would you like to be aligned?";
$lng["textcol"] = "What text would you like to be colored?";
$lng["textsiz"] = "What text would you like to be sized?";
$lng["urltxt"] = "Please enter the text you want linked. Hit cancel for the url to be shown.";
$lng["urlurl"] = "Please enter the url you wish to make a link to.";

// Added in FULL
$lng['noblank'] = "You must enter something!";

?>