<?
$site = ""; //T�rnaklar ��erisine Web sayfan�z� yaz�n.
$server = "localhost"; //Server genelde localhosttur yaln�z uzak sunucularda veya farkl� sunucularda �al��t�racaklar i�in buras� de�i�tirilecek.
$user = ""; //Veritaban� kullan�c�s�
$pass = ""; //Veritaban� kullan�c�s� �ifresi
$database = ""; //Veritaban� ad�.
mysql_connect($server, $user,$pass) or die ("Hata: veritaban�na ba�lan�lamad�!.Bilgiler yanl��");
mysql_select_db($database) or die ("Hata: veritaban�na ba�lan�lamad�!.Db yok");
mysql_query("SET NAMES 'latin5'");
?>