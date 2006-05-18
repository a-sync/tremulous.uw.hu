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

$lng["cbboff"] = "BB Kódok Engedélyezve A Hozzászólásokban";
$lng["cbbcolor"] = "[color=#aa00ff]színezés[/color]";
$lng["cbbalign"] = "[align=center]igazítás[/align]";
$lng["cbbsize"] = "[size=3]átméretezés[/size]";
$lng["cbbimg"] = "[img=www.kepbeszuras.hu/kep.jpg]";
$lng["cbbimg2"] = "[img]www.kepbeszuras.hu/kep.jpg[/img]";
$lng["cbburl"] = "[url=www.url.hu]hivatkozás[/url]";
$lng["cbburl2"] = "[url]www.url.hu[/url]";
$lng["cbblink"] = "[link=www.link.hu]hivatkozás[/link]";
$lng["cbblink2"] = "[link]www.link.hu[/link]";
$lng["cbbb"] = "[b]vastagítás[/b]";
$lng["cbbu"] = "[u]aláhúzás[/u]";
$lng["cbbi"] = "[i]dõlt írás[/i]";
$lng["perpage"] = "Hozzászólások Száma Egy Lapon";
$lng["sysinfo"] = "Rendszer Információ";
$lng["showpost"] = "Hozzászólás Panel Teljes Megjelenítése";
$lng["all"] = "Összes";
$lng["confiswrit"] = "A Beállítások A config.php Fájlba Írhatók";
$lng["bbcode"] = "BB Kód";

$lng["access"] = "Hozzáférés";
$lng["add"] = "Létrehozás";
$lng["addadmin"] = "Adminisztrátor Létrehozás";
$lng["addcat"] = "Kategória Létrehozás";
$lng["admincenter"] = "Adminisztrációs Center";
$lng["adminmode"] = "Adminisztrációs Felület";
$lng["addnews"] = "Hír Létrehozás";
$lng["again"] = "újra";
$lng["allcat"] = "Minden Kategória";
$lng["avail"] = "elérhetõ";
$lng["cantupdate"] = "Nem sikerült a tulajdonságok átállítása!";
$lng["cat"] = "Kategória";
$lng["cataccess"] = "Category Access";
$lng["catadded"] = "Kategória létrehozva!";
$lng["chpass"] = "Jelszó Változtatás";
$lng["credate"] = "Létrehozás Dátuma";
$lng["delcats"] = "Kategória Törlés";
$lng["delete"] = "Törlés";
$lng["deleteadmins"] = "Adminisztrátor Törlés";
$lng["delnews"] = "Hír Törlés";
$lng["edit"] = "Szerkesztés";
$lng["editadmin"] = "Adminisztrátor Beállítás";
$lng["editcat"] = "Kategória szerkesztés";
$lng["newsedit"] = "Hír Szerkesztés";
$lng["email"] = "E-mail";
$lng["error1"] = "Be kell írnod a felhasználóneved!";
$lng["error10"] = "Hibás jelszó!";
$lng["error11"] = "A config.php helytelenül van beállítva, vagy hiányzik!";
$lng["error2"] = "Be kell írnod a jelszót!";
$lng["error3"] = "Nincs jogod szerkeszteni a kategóriát!";
$lng["error4"] = "Be kell írnod egy címet!";
$lng["error5"] = "Választanod kell egy kategóriát!";
$lng["error6"] = "Nincs jogod ebben a kategóriában írni!";
$lng["error7"] = "Be kell írnod valamilyen hírt!";
$lng["error8"] = "Válassz egy kategóriát!";
$lng["error9"] = "Hibás Jelszó";
$lng["genssi"] = "SSI Létrehozás";
$lng["gendssi"] = "Létrehozott SSI";
$lng["generate"] = "Létrehozás";
$lng["invalseq"] = "Hibás felhasználónév/jelszó.";
$lng["invpanel"] = "Tiltott Panel!";
$lng["lang"] = "Nyelv";
$lng["lastip"] = "Legutóbbi IP";
$lng["lastlogin"] = "Legutóbbi Bejelentkezés";
$lng["login"] = "Bejelentkezés";
$lng["loginas"] = "Bejelentkezve";
$lng["namein"] = "néven.";
$lng["logout"] = "kijelentkezés";
$lng["mainsite"] = "Kezdõoldal";
$lng["myacset"] = "Beállításaim";
$lng["mysqlhost"] = "Mysql Hoszt";
$lng["mysqlp"] = "Mysql Jelszó";
$lng["mysqlpre"] = "Mysql Prefixum";
$lng["mysqlsets"] = "Mysql Beállítások";
$lng["mysqlu"] = "Mysql Felhasználónév";
$lng["name"] = "Név";
$lng["newpass"] = "Új Jelszó";
$lng["news"] = "Hírek";
$lng["newsadded"] = "Hír létrehozva!";
$lng["newsitems"] = "Hírek Száma Egy Lapon";
$lng["newsupd"] = "Hír szerkesztve!";
$lng["no"] = "Nem";
$lng["nocats"] = "Nincsen kategória";
$lng["nonews"] = "Nincs hír ebben a kategóriában";
$lng["noop"] = "Nincs választási lehetõség!";
$lng["oldpass"] = "Régi Jelszó";
$lng["passup"] = "Jelszó átállítva!";
$lng["password"] = "Jelszó";
$lng["plelog"] = "Adminisztrátor bejelentkezés!";
$lng["reocats"] = "Kategóriák Rendezése";
$lng["settup"] = "Beállítások Frissítve!";
$lng["showcopy"] = "Copyright Mutatása";
$lng["title"] = "Cím";
$lng["ua"] = "Felhasználó létrehozva!";
$lng["uppref"] = "E-Mail Változtatás";
$lng["update"] = "Frissítés";
$lng["upsets"] = "Beállítások";
$lng["username"] = "Felhasználónév";
$lng["version"] = "Verzió";
$lng["yes"] = "Igen";
$menulng["adminman"] = "Admin Menedzselés";
$menulng["catman"] = "Kategória Menedzselés";
$menulng["newsman"] = "Hír Menedzselés";
$menulng["utilman"] = "Eszközök";
$user_access_def["admins"] = "Admin Menedzselés";
$user_access_def["cat"] = "Kategória Menedzselés";
$user_access_def["newsadd"] = "Hír Menedzselés";
$user_access_def["newsedit"] = "Mások Híreinek Szerkesztése";
$user_access_def["prefset"] = "Saját Beállítások Szerkesztése";
$user_access_def["setup"] = "paNews Beállítások Szerkesztése";
$lng["alcom"] = "Hozzászólások Engedélyezése";
$lng["anonymous"] = "Vendég";
$lng["autoapprove"] = "Hozzászólások Automatikus Jóváhagyása";
$lng["comedited"] = "Hozzászólás Sikeresen Szerkesztve!";
$lng["comments"] = "Hozzászólások";
$lng["comnewsid"] = "Válassz egy Hír azonosítót!";
$lng["delcomm"] = "Hozzászólások Törlése";
$lng["editcom"] = "Hozzászólások Szerkesztése";
$lng["nocomm"] = "Ehhez a Hírhez nincs hozzászólás!";
$lng["nocomments"] = "A hozzászólások ki vannak kapcsolva!";
$lng["paset"] = "paNews Beállítások";
$lng["postcom"] = "Új Hozzászólás";
$lng["postcomm"] = "Hozzászólás";
$lng["postip"] = "Küldõ IP-je";
$lng["reorder"] = "Rendezés";
$lng["weburl"] = "Weblap";
$lng["yacct"] = "Saját Beállítások";
$menulng["comment"] = "Hozzászólás Menedzselés";
$user_access_def["comment"] = "Hozzászólás Menedzselés";
$lng["mustset"] = "Változtasd meg a változókat viewnews.php-ban!";
$lng["linkto"] = "Hivatkozás";
$lng["notlink"] = "Hivatkozás nélkül";
$colors["000000"] = "Fekete";
$colors["0000ff"] = "Kék";
$colors["00ff00"] = "Zöld";
$colors["ff8000"] = "Narancs";
$colors["ff0000"] = "Piros";
$colors["ffffff"] = "Fehér";
$colors["ffff00"] = "Sárga";

$lng["alignm"] = "Igazítások";
$lng["alignmc"] = "Középre";
$lng["alignml"] = "Balra";
$lng["alignmr"] = "Jobbra";
$lng["badauth"] = "Megfelelõ felhasználónevet és jelszót kell megadnod!";
$lng["colors"] = "Színek";
$lng["coloth"] = "Add meg a kívánt szövegszín színkódját!";
$lng["imgtext"] = "Add meg a kívánt kép címét. Fontos, hogy a teljes hivatkozást használd!";
$lng["newdays"] = "Újnak Jelölt Napok Száma";
$lng["other"] = "Egyéb";
$lng["realm"] = "paNews Adminisztráció";
$lng["size"] = "Méret";
$lng["textali"] = "Milyen szöveget szeretnél átigazítani?";
$lng["textcol"] = "Milyen szöveget szeretnél átszínezni?";
$lng["textsiz"] = "Milyen szöveget szeretnél átméretezni?";
$lng["urltxt"] = "Add meg a szöveget amit linkelni akarsz. Nyomj a Mégsére ha a hivatkozást akarod mutatni.";
$lng["urlurl"] = "Add meg a hivatkozást amibõl linket akarsz csinálni.";

// Added in FULL
$lng['noblank'] = "Írnod kell valamit!";

?>