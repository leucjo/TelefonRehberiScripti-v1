<?php
include("../db.php"); //DB'ye baðlandýn.

$edit_ID = $_GET['id']; //Güncelle butonuna bastýgýnda gelen id deðerini edit_ID deðiþkeni ile yakaladýn.

if($_POST) { //Eðer veriler post edilmiþse, yani submit butonuna basýldýysa

$isim = $_POST['isim'];
/*$soyisim = $_POST['soyisim'];
$evtel = $_POST['evtel'];
$ceptel = $_POST['ceptel'];
$adres = $_POST['adres'];
$il = $_POST['il'];
*/
if(empty($isim)) {
echo "Boþ Alan Býrakma";
} else {
$vGuncelle = mysql_query("UPDATE il SET adi='$isim' where id='$edit_ID'");
if($vGuncelle) {
echo "<center>$edit_ID nolu görev yeri güncellendi<br>";
echo "<br><a href='gorevyerilist.php'>Görev Yeri Tanýmlarýna Git</a></center>";
} else {
echo "Veri güncellenemiyor";
}
}

} else { //Veriler post edilmemiþse bunlar gelicek.

$sorgu=mysql_query("SELECT * FROM il WHERE id=$edit_ID");
 while($sonuc=mysql_fetch_array($sorgu)) //select sonunda gelen verileri deðiþkene alýyorum.
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
  <td>Adý</td>
  <td><input type='text' name='isim' value='$isim' /></td> 
 </tr>
 <tr>
   <td bgcolor='#b30016'></td>
   <td bgcolor='#b30016'>
     <input type='submit' value='Güncelle!' />
   </td>
 </tr>
</table>
</form>";
}

?>


