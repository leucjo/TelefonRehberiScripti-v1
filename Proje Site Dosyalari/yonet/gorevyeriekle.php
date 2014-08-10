<? include("../db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Telefon Rehberi v1.0</title>
<link rel="stylesheet" href="stil.css" type="text/css" media="screen" />
</head>

<body>
<?
$ix = $_POST['ix'];
if($ix == "1"){
$adi = $_POST['isim'];
/*$soyadi = $_POST['soyisim'];
$evtel = $_POST['evtel'];
$ceptel = $_POST['ceptel'];
$adres = $_POST['adres'];
$il = $_POST['il'];
	*/
$sor="INSERT INTO il(adi) VALUES (UPPER('$adi'))";
$sorgu = mysql_query ($sor) or die(mysql_errno().' '.mysql_error());

if($sorgu)
{

echo "<center>Görev Yeri eklendi: <font color=#b30016 size=3>$adi</font>";
echo "<br><a href='gorevyerilist.php'>Görev Yeri Tanımlarına Git</a></center>";
} else
{ echo "Hata var";
}

}else{
?>

<form action="gorevyeriekle.php" method="post">
<INPUT type=hidden value=1 name=ix> 
<table width="750" align="center" border="1">
  <tr>
    <td width="150">Görev Yeri:</td>
    <td width="584"><label>
      <input type="text" name="isim" id="isim" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="button" id="button" value="Ekle" />
      <input type="reset" name="button2" id="button2" value="Temizle" />
    </label></td>
  </tr>
</table>
</form>
<? }?>


</body>
</html>
