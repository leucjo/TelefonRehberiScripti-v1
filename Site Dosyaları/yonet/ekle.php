<? include("../db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Telefon Rehberi v1.0</title>
<link rel="stylesheet" href="../stil.css" type="text/css" media="screen" />
</head>

<body>

<?
$ix = $_POST['ix'];
if($ix == "1"){
$adi = $_POST['isim'];
$soyadi = $_POST['soyisim'];
$evtel = $_POST['evtel'];
$ceptel = $_POST['ceptel'];
$adres = $_POST['adres'];
$il = $_POST['il'];
	
	if(empty($adi) || empty($soyadi) || empty($ceptel))
	{
	echo "<center>Ad - Soyad - Dahili No alanları dolu olmalıdır.</center><br>";
	echo "<center><br><a href='../yonet/index2.php'>Yönetim Paneline Git</a> <br> <a href='../yonet/ekle.php'>Yeni Kayıt Ekle</a></center>";
	} else {
$sor="INSERT INTO telefon VALUES ('',UPPER('$adi'),UPPER('$soyadi'),'$evtel','$ceptel','$adres','$il')";
$sorgu = mysql_query ($sor) or die(mysql_errno().' '.mysql_error());
if($sorgu)
{
echo "<center><font color=red size=4>$adi $soyadi</font> Rehbere Eklendi</center>";
echo "<center><br><a href='../yonet/index2.php'>Yönetim Paneline Git</a> <br> <a href='../yonet/ekle.php'>Yeni Kayıt Ekle</a></center>";
} else {
echo "Eklenemedi!!!";
}

}
}else{
?>

<form action="ekle.php" method="post">
<INPUT type=hidden value=1 name=ix>
<fieldset>
<legend>Kişisel Bilgiler</legend>
<table width="400" align="center" border="0">
  <tr>
    <td width="150">İsim:</td>
    <td width="250"><label>
      <input type="text" name="isim" id="isim" />
    </label></td>
  </tr>
  <tr>
    <td width="150">Soyisim:</td>
    <td width="250"><label>
      <input type="text" name="soyisim" id="soyisim" />
    </label></td>
  </tr>
  <tr>
    <td width="150">Mail Adres</td>
    <td width="250"><label>
      <input type="text" name="evtel" id="evtel" />
    </label></td>
  </tr>
  <tr>
    <td width="150">Dahili No</td>
    <td width="250"><label>
      <input type="text" name="ceptel" id="ceptel" />
    </label></td>
  </tr>
  
  <tr>
    <td width="150">Görev Yeri:</td>
    <td width="250"><select name="il">
					
<?
$q2=mysql_query("select  * from il order by adi");
while ($r2=mysql_fetch_array($q2))
echo "<option value=$r2[id]>$r2[adi]</option>";

?>
						

		  </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="button" id="button" value="Ekle" ></input>
      <input type="reset" name="button2" id="button2" value="Temizle" /></input>
    </label></td>
  </tr>
</table>
</fieldset>
</form>
<?
}

?> 

</body>
</html>
