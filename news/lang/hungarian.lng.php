<?

/*
  paNews 2.0 Beta 4
  �2003 PHP Arena
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

$lng["cbboff"] = "BB K�dok Enged�lyezve A Hozz�sz�l�sokban";
$lng["cbbcolor"] = "[color=#aa00ff]sz�nez�s[/color]";
$lng["cbbalign"] = "[align=center]igaz�t�s[/align]";
$lng["cbbsize"] = "[size=3]�tm�retez�s[/size]";
$lng["cbbimg"] = "[img=www.kepbeszuras.hu/kep.jpg]";
$lng["cbbimg2"] = "[img]www.kepbeszuras.hu/kep.jpg[/img]";
$lng["cbburl"] = "[url=www.url.hu]hivatkoz�s[/url]";
$lng["cbburl2"] = "[url]www.url.hu[/url]";
$lng["cbblink"] = "[link=www.link.hu]hivatkoz�s[/link]";
$lng["cbblink2"] = "[link]www.link.hu[/link]";
$lng["cbbb"] = "[b]vastag�t�s[/b]";
$lng["cbbu"] = "[u]al�h�z�s[/u]";
$lng["cbbi"] = "[i]d�lt �r�s[/i]";
$lng["perpage"] = "Hozz�sz�l�sok Sz�ma Egy Lapon";
$lng["sysinfo"] = "Rendszer Inform�ci�";
$lng["showpost"] = "Hozz�sz�l�s Panel Teljes Megjelen�t�se";
$lng["all"] = "�sszes";
$lng["confiswrit"] = "A Be�ll�t�sok A config.php F�jlba �rhat�k";
$lng["bbcode"] = "BB K�d";

$lng["access"] = "Hozz�f�r�s";
$lng["add"] = "L�trehoz�s";
$lng["addadmin"] = "Adminisztr�tor L�trehoz�s";
$lng["addcat"] = "Kateg�ria L�trehoz�s";
$lng["admincenter"] = "Adminisztr�ci�s Center";
$lng["adminmode"] = "Adminisztr�ci�s Fel�let";
$lng["addnews"] = "H�r L�trehoz�s";
$lng["again"] = "�jra";
$lng["allcat"] = "Minden Kateg�ria";
$lng["avail"] = "el�rhet�";
$lng["cantupdate"] = "Nem siker�lt a tulajdons�gok �t�ll�t�sa!";
$lng["cat"] = "Kateg�ria";
$lng["cataccess"] = "Category Access";
$lng["catadded"] = "Kateg�ria l�trehozva!";
$lng["chpass"] = "Jelsz� V�ltoztat�s";
$lng["credate"] = "L�trehoz�s D�tuma";
$lng["delcats"] = "Kateg�ria T�rl�s";
$lng["delete"] = "T�rl�s";
$lng["deleteadmins"] = "Adminisztr�tor T�rl�s";
$lng["delnews"] = "H�r T�rl�s";
$lng["edit"] = "Szerkeszt�s";
$lng["editadmin"] = "Adminisztr�tor Be�ll�t�s";
$lng["editcat"] = "Kateg�ria szerkeszt�s";
$lng["newsedit"] = "H�r Szerkeszt�s";
$lng["email"] = "E-mail";
$lng["error1"] = "Be kell �rnod a felhaszn�l�neved!";
$lng["error10"] = "Hib�s jelsz�!";
$lng["error11"] = "A config.php helytelen�l van be�ll�tva, vagy hi�nyzik!";
$lng["error2"] = "Be kell �rnod a jelsz�t!";
$lng["error3"] = "Nincs jogod szerkeszteni a kateg�ri�t!";
$lng["error4"] = "Be kell �rnod egy c�met!";
$lng["error5"] = "V�lasztanod kell egy kateg�ri�t!";
$lng["error6"] = "Nincs jogod ebben a kateg�ri�ban �rni!";
$lng["error7"] = "Be kell �rnod valamilyen h�rt!";
$lng["error8"] = "V�lassz egy kateg�ri�t!";
$lng["error9"] = "Hib�s Jelsz�";
$lng["genssi"] = "SSI L�trehoz�s";
$lng["gendssi"] = "L�trehozott SSI";
$lng["generate"] = "L�trehoz�s";
$lng["invalseq"] = "Hib�s felhaszn�l�n�v/jelsz�.";
$lng["invpanel"] = "Tiltott Panel!";
$lng["lang"] = "Nyelv";
$lng["lastip"] = "Legut�bbi IP";
$lng["lastlogin"] = "Legut�bbi Bejelentkez�s";
$lng["login"] = "Bejelentkez�s";
$lng["loginas"] = "Bejelentkezve";
$lng["namein"] = "n�ven.";
$lng["logout"] = "kijelentkez�s";
$lng["mainsite"] = "Kezd�oldal";
$lng["myacset"] = "Be�ll�t�saim";
$lng["mysqlhost"] = "Mysql Hoszt";
$lng["mysqlp"] = "Mysql Jelsz�";
$lng["mysqlpre"] = "Mysql Prefixum";
$lng["mysqlsets"] = "Mysql Be�ll�t�sok";
$lng["mysqlu"] = "Mysql Felhaszn�l�n�v";
$lng["name"] = "N�v";
$lng["newpass"] = "�j Jelsz�";
$lng["news"] = "H�rek";
$lng["newsadded"] = "H�r l�trehozva!";
$lng["newsitems"] = "H�rek Sz�ma Egy Lapon";
$lng["newsupd"] = "H�r szerkesztve!";
$lng["no"] = "Nem";
$lng["nocats"] = "Nincsen kateg�ria";
$lng["nonews"] = "Nincs h�r ebben a kateg�ri�ban";
$lng["noop"] = "Nincs v�laszt�si lehet�s�g!";
$lng["oldpass"] = "R�gi Jelsz�";
$lng["passup"] = "Jelsz� �t�ll�tva!";
$lng["password"] = "Jelsz�";
$lng["plelog"] = "Adminisztr�tor bejelentkez�s!";
$lng["reocats"] = "Kateg�ri�k Rendez�se";
$lng["settup"] = "Be�ll�t�sok Friss�tve!";
$lng["showcopy"] = "Copyright Mutat�sa";
$lng["title"] = "C�m";
$lng["ua"] = "Felhaszn�l� l�trehozva!";
$lng["uppref"] = "E-Mail V�ltoztat�s";
$lng["update"] = "Friss�t�s";
$lng["upsets"] = "Be�ll�t�sok";
$lng["username"] = "Felhaszn�l�n�v";
$lng["version"] = "Verzi�";
$lng["yes"] = "Igen";
$menulng["adminman"] = "Admin Menedzsel�s";
$menulng["catman"] = "Kateg�ria Menedzsel�s";
$menulng["newsman"] = "H�r Menedzsel�s";
$menulng["utilman"] = "Eszk�z�k";
$user_access_def["admins"] = "Admin Menedzsel�s";
$user_access_def["cat"] = "Kateg�ria Menedzsel�s";
$user_access_def["newsadd"] = "H�r Menedzsel�s";
$user_access_def["newsedit"] = "M�sok H�reinek Szerkeszt�se";
$user_access_def["prefset"] = "Saj�t Be�ll�t�sok Szerkeszt�se";
$user_access_def["setup"] = "paNews Be�ll�t�sok Szerkeszt�se";
$lng["alcom"] = "Hozz�sz�l�sok Enged�lyez�se";
$lng["anonymous"] = "Vend�g";
$lng["autoapprove"] = "Hozz�sz�l�sok Automatikus J�v�hagy�sa";
$lng["comedited"] = "Hozz�sz�l�s Sikeresen Szerkesztve!";
$lng["comments"] = "Hozz�sz�l�sok";
$lng["comnewsid"] = "V�lassz egy H�r azonos�t�t!";
$lng["delcomm"] = "Hozz�sz�l�sok T�rl�se";
$lng["editcom"] = "Hozz�sz�l�sok Szerkeszt�se";
$lng["nocomm"] = "Ehhez a H�rhez nincs hozz�sz�l�s!";
$lng["nocomments"] = "A hozz�sz�l�sok ki vannak kapcsolva!";
$lng["paset"] = "paNews Be�ll�t�sok";
$lng["postcom"] = "�j Hozz�sz�l�s";
$lng["postcomm"] = "Hozz�sz�l�s";
$lng["postip"] = "K�ld� IP-je";
$lng["reorder"] = "Rendez�s";
$lng["weburl"] = "Weblap";
$lng["yacct"] = "Saj�t Be�ll�t�sok";
$menulng["comment"] = "Hozz�sz�l�s Menedzsel�s";
$user_access_def["comment"] = "Hozz�sz�l�s Menedzsel�s";
$lng["mustset"] = "V�ltoztasd meg a v�ltoz�kat viewnews.php-ban!";
$lng["linkto"] = "Hivatkoz�s";
$lng["notlink"] = "Hivatkoz�s n�lk�l";
$colors["000000"] = "Fekete";
$colors["0000ff"] = "K�k";
$colors["00ff00"] = "Z�ld";
$colors["ff8000"] = "Narancs";
$colors["ff0000"] = "Piros";
$colors["ffffff"] = "Feh�r";
$colors["ffff00"] = "S�rga";

$lng["alignm"] = "Igaz�t�sok";
$lng["alignmc"] = "K�z�pre";
$lng["alignml"] = "Balra";
$lng["alignmr"] = "Jobbra";
$lng["badauth"] = "Megfelel� felhaszn�l�nevet �s jelsz�t kell megadnod!";
$lng["colors"] = "Sz�nek";
$lng["coloth"] = "Add meg a k�v�nt sz�vegsz�n sz�nk�dj�t!";
$lng["imgtext"] = "Add meg a k�v�nt k�p c�m�t. Fontos, hogy a teljes hivatkoz�st haszn�ld!";
$lng["newdays"] = "�jnak Jel�lt Napok Sz�ma";
$lng["other"] = "Egy�b";
$lng["realm"] = "paNews Adminisztr�ci�";
$lng["size"] = "M�ret";
$lng["textali"] = "Milyen sz�veget szeretn�l �tigaz�tani?";
$lng["textcol"] = "Milyen sz�veget szeretn�l �tsz�nezni?";
$lng["textsiz"] = "Milyen sz�veget szeretn�l �tm�retezni?";
$lng["urltxt"] = "Add meg a sz�veget amit linkelni akarsz. Nyomj a M�gs�re ha a hivatkoz�st akarod mutatni.";
$lng["urlurl"] = "Add meg a hivatkoz�st amib�l linket akarsz csin�lni.";

// Added in FULL
$lng['noblank'] = "�rnod kell valamit!";

?>