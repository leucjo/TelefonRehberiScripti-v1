<?php
session_start();

if (!$_SESSION['girisok']) {
if(!$_POST) {
// Post Edilmemiþse

echo "
<form action='' method='post'>
<table align='center' width='320' cellpadding='0' cellspacing='0' border='1'><tr>
<td width='160' align='left'>Kullanýcý Adý</td>
<td width='160'>: <input type='text' name='kadi' /></td>
</tr>
<tr>
<td width='160'>Þifre</td>
<td width='160'>: <input type='password' name='sifre' /></td>
</tr>
<tr>
<td colspan='2' align='center'><input type='submit' value='Giriþ Yap' /></td>
</tr>
</table>
</form>
";

} else {
// Post Edilmiþ Ýse
$kadi = $_POST['kadi'];
$sifre = $_POST['sifre'];
if(empty($kadi) || empty($sifre)) {
echo 'Kullanýcý Adý Veya Þifre Boþ Olamaz';
} else if($kadi=='santral' && $sifre=='ömer0') {

$_SESSION['girisok'] = TRUE;
echo "<center><a href='index2.php'>Yönetim Paneline Git</a></center>";
} else {
echo "<center>KULLANICI ADI VEYA PAROLA HATALI<br>
<a href=''>Tekrar Deneyin</a>
</center>";
}
} // Bu Demek Oluyorki Post Edilmiþ Ýse Burayý Deðil Ýse Burayý Göster ...

} else {
echo "<center><a href='index2.php'>Yönetim Paneline Git</a></center>";
}

?>