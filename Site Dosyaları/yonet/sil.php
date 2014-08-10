<? 
include("../db.php");
$id = $_GET['id'];
if($_GET['id']!="")
{	
$sorgu=mysql_query("Delete from telefon where id = '$id'");
if($sorgu)
{
echo "<center>$id nolu kayıt rehberden silindi<br>";
} 
else
{
echo "Hata Var.";
}

echo "<br><a href='javascript: window.close()'>Kapat</a>";
}
?>