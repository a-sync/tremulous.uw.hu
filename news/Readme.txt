******************************************************************************
**  Removing the copyright is illegal unless you paid the $50 fee! The fee  **
**              is subject to change but no matter! Keep it on!             **
******************************************************************************

Welcome to the new paNews beta 3! This script has been re-written by
Andrew because the old panews was old, full of security flaws, amongst other
things. If you were using this version, please install a clean copy of this
release. All bug reports should be posted at the phpArena support forums
or emailed to bugs@phparena.net. Thanks!

Installation:

1) Upload all files to a directory on your server.
2) CHMOD sessions/, config.php, and lock.php to 777.
3) (optional) Create a database for panews.
4) Run the installer.
6) Login! When no users are found in the database, the first user that
	attempts to login is automatically created with full permissions.
7) If your server doesn't allow cookie mode, or you wish to use sessions,
	manually edit the config.php and change into session mode.
8) Go under generate SSI and get the correct variables for viewnews.php
9) Update the variables for viewnews.php

Upgrading (from beta 3):
1) Delete *all* files and folders *except* config.php.
2) Upload all files to a directory on your server.
3) CHMOD sessions/, config.php, and lock.php to 777.
4) Manually edit config.php.
	- Change $version = "2.0b3";
		to
	         $version = "2.0b4";
4) Go under generate SSI and get the correct variables for viewnews.php
5) Update the variables for viewnews.php

Upgrading (from beta 2):
1) Delete *all* files and folders *except* config.php.
2) Upload all files to a directory on your server.
3) CHMOD sessions/, config.php, and lock.php to 777.
4) Run upgradeb2tob3.php.
5) Manually edit config.php.
	- Change $version = "2.0b3";
		to
	         $version = "2.0b4";
6) If your server doesn't allow cookie mode, or you wish to use sessions,
	manually edit the config.php and change into session mode.
7) Go under generate SSI and get the correct variables for viewnews.php
8) Update the variables for viewnews.php

Upgrading (from beta 1):

1) Delete *all* files and folders *except* config.php.
2) Upload all files to a directory on your server.
3) CHMOD sessions/, config.php, and lock.php to 777.
4) Run upgradeb1tob2.php.
5) Run upgradeb2tob3.php.
6) Manually edit config.php.
	- Change $version = "2.0b3";
		to
	         $version = "2.0b4";
7) If your server doesn't allow cookie mode, or you wish to use sessions,
	manually edit the config.php and change into session mode.
8) Go under generate SSI and get the correct variables for viewnews.php
9) Update the variables for viewnews.php

Changelog:
2.0 beta 4:
	- Added URL encryption to viewnews email addresses.
	- Removed requirement for copyright on viewnews.
	- Fixed viewnews bug when no category was selected.
	- Added viewnews New! indicator.
		- In template. The new indicator text is defined per-template
			in between <new> and </new>.
	- Added <ifcomment> tag to viewnews template to hide text when comments
		are shut off.
	- Fixed SSI Generator for \\ in windows paths.
		- This is untested.
	- Fixed a couple xhtml errors with tags like disabled.
	- Easy paCode insertion!
	- Fixed paCode bug where code isnt replaced when the code spans
		multiple lines
	- Fixed license in installer to work under netscape.
2.0 beta 3:
	- Made XHTML Compliant.
	- Removed MySQL Settings from config panel as it was pointless.
	- Removed Spyware from script.
	- Added easy way to shut off version check for those people who think
		I am going to end the world by having a couple bytes of information
		sent to me.
	- Fixed the SSI path detector.
	- Viewnews.php... Changed include to include_once to prevent errors.
	- SSI Generator tells you if the viewnews.php settings are correct. If not,
		it tells you what to set them to.
	- New paCode:
		[img=http://url/to/image.gif]
		[url]http://url[/url] (added  as extra to [link])
		[url=http://url]text[/url] (added  as extra to [link])
		[size=-5]SIZED TEXT[/size]
	- Made [link]linkstuff[/link] accept anything as links.
	- Added irc:// link support.
	- Fixed permissions for comments.
	- Added cookie auth method.
	- Fixed delete category bug.
	- Added linked categories.
	- Added No Approval Indicators in comment management.
	- Unapproved comments automatically checked in delete comments.

2.0 beta 2:
	- Added Comments

2.0 beta 1:
	- Initial Release

Note: Version check is built in! Never have to worry about old versions
	again! I will always write a convenient upgrader for every version,
	if necessary. "Where is this?" you ask. Go into paNews configuration
	in the admin directory. A message will be displayed next to the
	version with a convenient download location. Enjoy!

******************************************************************************
**  Removing the copyright is illegal unless you paid the $50 fee! The fee  **
**              is subject to change but no matter! Keep it on!             **
**  You are free to not have a copyright under viewnews.php but the one on  **
**                        the main script must stay!                        **
******************************************************************************