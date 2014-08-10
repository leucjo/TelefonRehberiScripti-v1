<?php
include("../db.php");

session_start();
if (!$_SESSION['girisok']) {
	echo "<center>Giriş Yapmadan Yönetim Paneline Giremezsiniz!</center>";
} else {

echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-9' />
<link rel='stylesheet' href='../stil.css' type='text/css' media='screen' />
<title>Telefon Rehberi v1.0</title>
<script type='text/javascript' src='../PencereOrtala.js'></script>
</head>
<body>
<table width='750' align='center' style='border:1px dashed'>
<tr><td>
<ul>
<li><a href='javascript: PencereOrtala(\"ekle.php\",440,230);'>Yeni Kişi Ekle</a></li>
<li><a href='gorevyerilist.php'>Görev Yeri Tanımları</a></li>
<li><a href='cikis.php'>Oturumu Kapat</a></li>
</td>
</tr>
</table>
<br>

  <table width='950' align='center' style='border:1px dashed'>
     <tr>
       <th width='300' style='background-color:#b3df27' scope='col'>Isim Soyisim</th>
       <th width='80' style='background-color:#b3df27' scope='col'>Dahili No</th>
       
       <th width='400' style='background-color:#b3df27' scope='col'>Görev Yeri</th>
       <th width='150' style='background-color:#b3df27' scope='col'>Yapılacak İşlem</th>
     </tr>";
     $fxtel=mysql_query("select * from telefon order by adi"); 
   while ($fxz=mysql_fetch_array($fxtel))  {
   echo "<tr bgcolor='#ffffff' onMouseOver=\"this.style.backgroundColor='#cccccc';this.style.color='#ffffff';\" onMouseOut=\"this.style.backgroundColor='#ffffff';this.style.color='#000000';\">
       <td>".$fxz['adi']." ".$fxz['soyadi']."</td>
       <td>".$fxz['ceptel']."</td>
      
       <td>";
       $fxil=mysql_fetch_array(mysql_query("select * from il where id=".$fxz['il'].""));
       echo "".$fxil['adi']."";
       $silmsj="".$fxz['adi']." ".$fxz['soyadi']." Silinecek Emin Misiniz?";
       echo "</td>
       <td><a href='javascript: PencereOrtala(\"sil.php?id=".$fxz['id']."\",420,200);' onclick=\"return (confirm('".$silmsj."'));\">Sil</a>
       <a href='javascript: PencereOrtala(\"guncelle.php?id=".$fxz['id']."\",420,200);'> - Güncelle</a>
</td>
     </tr>";
    } 
   echo " </table>
</body>
</html>";
}
?>