<?php
include("../db.php");

echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-9' />
<link rel='stylesheet' href='../stil.css' type='text/css' media='screen' />
<title>Telefon Rehberi v1.0</title>
</head>

<body>

<table width='750' align='center' style='border:1px solid'>
<tr><td>
<ul>
<li><a href='gorevyeriekle.php'>Yeni Görev Yeri Ekle</a></li>
</td>
</tr>
</table>
<br>

    <table width='750' align='center' border='0'>
     <tr>
       <th width='156' style='background-color:#b3df27' scope='col'>Görev Yeri</th>
       <th width='50' style='background-color:#b3df27' scope='col'>Yapılacak İşlem</th>
     </tr>";
  
     $fxtel=mysql_query("select * from il order by adi"); 
   while ($fxz=mysql_fetch_array($fxtel))  {
      
      echo "<tr>
       <td>".$fxz['adi']."</td>
       <td><a href='gorevyerisil.php?id=".$fxz['id']."'>Sil</a> - <a href='gorevyeriguncelle.php?id=".$fxz['id']."'>Güncelle</a></td>
     </tr>";
  
   }
    echo "</table>

<center><br><a href='../yonet'>Yönetim Paneline Git</a></center>
</body>
</html>";
