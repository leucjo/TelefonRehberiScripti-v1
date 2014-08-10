<?
$site = ""; //Týrnaklar Ýçerisine Web sayfanýzý yazýn.
$server = "localhost"; //Server genelde localhosttur yalnýz uzak sunucularda veya farklý sunucularda çalýþtýracaklar için burasý deðiþtirilecek.
$user = ""; //Veritabaný kullanýcýsý
$pass = ""; //Veritabaný kullanýcýsý þifresi
$database = ""; //Veritabaný adý.
mysql_connect($server, $user,$pass) or die ("Hata: veritabanýna baðlanýlamadý!.Bilgiler yanlýþ");
mysql_select_db($database) or die ("Hata: veritabanýna baðlanýlamadý!.Db yok");
mysql_query("SET NAMES 'latin5'");
?>