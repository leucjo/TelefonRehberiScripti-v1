<?php
include("../db.php"); //DB'ye ba�land�n.

$edit_ID = $_GET['id']; //G�ncelle butonuna bast�g�nda gelen id de�erini edit_ID de�i�keni ile yakalad�n.

if($_POST) { //E�er veriler post edilmi�se, yani submit butonuna bas�ld�ysa

$isim = $_POST['isim'];
/*$soyisim = $_POST['soyisim'];
$evtel = $_POST['evtel'];
$ceptel = $_POST['ceptel'];
$adres = $_POST['adres'];
$il = $_POST['il'];
*/
if(empty($isim)) {
echo "Bo� Alan B�rakma";
} else {
$vGuncelle = mysql_query("UPDATE il SET adi='$isim' where id='$edit_ID'");
if($vGuncelle) {
echo "<center>$edit_ID nolu g�rev yeri g�ncellendi<br>";
echo "<br><a href='gorevyerilist.php'>G�rev Yeri Tan�mlar�na Git</a></center>";
} else {
echo "Veri g�ncellenemiyor";
}
}

} else { //Veriler post edilmemi�se bunlar gelicek.

$sorgu=mysql_query("SELECT * FROM il WHERE id=$edit_ID");
 while($sonuc=mysql_fetch_array($sorgu)) //select sonunda gelen verileri de�i�kene al�yorum.
 {  
                $isim=$sonuc['adi']; 
                /*$soyisim=$sonuc['soyadi'];
                $evtel=$sonuc['evtel'];
                $ceptel=$sonuc['ceptel'];
                $adres=$sonuc['adres'];
                $il=$sonuc['il'];*/
 }

echo "<form name='form1' action='' method='POST'>
<table width='300' align='center' border='0'>
 <tr>
  <td>Ad�</td>
  <td><input type='text' name='isim' value='$isim' /></td> 
 </tr>
 <tr>
   <td bgcolor='#b30016'></td>
   <td bgcolor='#b30016'>
     <input type='submit' value='G�ncelle!' />
   </td>
 </tr>
</table>
</form>";
}

?>


