<?php
session_start();

if (!$_SESSION['girisok']) {
if(!$_POST) {
// Post Edilmemi�se

echo "
<form action='' method='post'>
<table align='center' width='320' cellpadding='0' cellspacing='0' border='1'><tr>
<td width='160' align='left'>Kullan�c� Ad�</td>
<td width='160'>: <input type='text' name='kadi' /></td>
</tr>
<tr>
<td width='160'>�ifre</td>
<td width='160'>: <input type='password' name='sifre' /></td>
</tr>
<tr>
<td colspan='2' align='center'><input type='submit' value='Giri� Yap' /></td>
</tr>
</table>
</form>
";

} else {
// Post Edilmi� �se
$kadi = $_POST['kadi'];
$sifre = $_POST['sifre'];
if(empty($kadi) || empty($sifre)) {
echo 'Kullan�c� Ad� Veya �ifre Bo� Olamaz';
} else if($kadi=='santral' && $sifre=='�mer0') {

$_SESSION['girisok'] = TRUE;
echo "<center><a href='index2.php'>Y�netim Paneline Git</a></center>";
} else {
echo "<center>KULLANICI ADI VEYA PAROLA HATALI<br>
<a href=''>Tekrar Deneyin</a>
</center>";
}
} // Bu Demek Oluyorki Post Edilmi� �se Buray� De�il �se Buray� G�ster ...

} else {
echo "<center><a href='index2.php'>Y�netim Paneline Git</a></center>";
}

?>