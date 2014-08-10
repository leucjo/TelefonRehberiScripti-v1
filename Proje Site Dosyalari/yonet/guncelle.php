<?php
include("../db.php"); //DB'ye baðlandýn.

$edit_ID = $_GET['id']; //Güncelle butonuna bastýgýnda gelen id deðerini edit_ID deðiþkeni ile yakaladýn.

if($_POST) { //Eðer veriler post edilmiþse, yani submit butonuna basýldýysa

$isim = $_POST['isim'];
$soyisim = $_POST['soyisim'];
$evtel = $_POST['evtel'];
$ceptel = $_POST['ceptel'];
$adres = $_POST['adres'];
$il = $_POST['il'];

if(empty($isim) || empty($ceptel)) {
echo "<center>Ýsim ve Dahili Alanlarýndan Boþ Býrakmamalýsýn.<br><br>
<a href='javascript:history.back()'>Geri Dön</a>

</center>";
} else {
$vGuncelle = mysql_query("UPDATE telefon SET adi=UPPER('$isim'),soyadi=UPPER('$soyisim'),evtel='$evtel',ceptel='$ceptel',adres='$adres',il='$il' where id='$edit_ID'");
if($vGuncelle) {
echo "<center>$edit_ID nolu kayýt güncellendi<br><br>";
echo "<a href='javascript: window.close()'>Kapat</a>";
} else {
echo "Veri güncellenemiyor";
}
}

} else { //Veriler post edilmemiþse bunlar gelicek.

$sorgu=mysql_query("SELECT * FROM telefon WHERE id=$edit_ID");
 while($sonuc=mysql_fetch_array($sorgu)) //select sonunda gelen verileri deðiþkene alýyorum.
 {  
                $isim=$sonuc['adi']; 
                $soyisim=$sonuc['soyadi'];
                $evtel=$sonuc['evtel'];
                $ceptel=$sonuc['ceptel'];
                $adres=$sonuc['adres'];
                $il=$sonuc['il'];
 }
 
 $sorgu2=mysql_query("select * from il where id='$il' ");
 while($gelen=mysql_fetch_array($sorgu2))
 {
 $yeniil=$gelen['adi'];
 $ilid=$gelen['id'];
 }
 
echo "<form name='form1' action='' method='POST'>
<table align='center' width='400' border='1'>
 <tr>
  <td>Adý</td>
  <td><input type='text' name='isim' value='$isim' /></td> 
 </tr>
 <tr>
  <td>Soyadý</td>
  <td><input type='text' name='soyisim' value='$soyisim' /></td> 
 </tr>
 <tr>
  <td>Mail Adres</td>
  <td><input type='text' name='evtel' value='$evtel' /></td> 
 </tr>
 <tr>
  <td>Dahili No</td>
  <td><input type='text' name='ceptel' value='$ceptel'/></td> 
 </tr>
 <tr>
  <td>Görev Yeri</td>
  <td>
    <select name='il'>
                  <option selected='' value='".$ilid."'>Seçili: $yeniil</option>";
                  
                  $ilgetir=mysql_query("select  * from il order by adi");
while ($goster=mysql_fetch_array($ilgetir))
echo "<option value=".$goster['id'].">".$goster['adi']."</option>";
                  
  echo "</td> 
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


