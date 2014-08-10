<? include("../db.php");
$id = $_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Telefon Rehberi v1.0</title>
<style>

#sayfa  

{  

    width:800px;  

}  

  

#ustAlan  

{
	float:left;
    width: 800px;  
	height:78px;
	background-image:url(image/ustpix.gif);
	background-repeat:repeat-x;

}   
#ustAlan2  

{
	float:left;
    width: 500px;
	margin-left:300px;


}  

   

 #icerik  

 {  
float: right;  
width: 750px;
margin-top:10px;

}  
#altAlan  

{  

    width: 800px;
	height:31px;
	background-image:url(image/altpix.gif);
	background-repeat:repeat-x;
	text-align:center;
	padding-top:5px;
     clear: both;  

 } 
 a img, a.img { 
border-style : none; } 
a:link { 
color : #b30016; 
text-decoration : none; } 
a:visited { 
text-decoration : none; 
color : #b30016; } 
a:hover { 
text-decoration : none; 
color : #ffffff; } 
a:active { 
text-decoration : none; 
color : #b30016; } 
</style>
</head>

<body>

<?
if($_GET[id]!="")
{
	$kontrol = mysql_query("SELECT * FROM telefon where il=$id"); 
    
    if(mysql_num_rows($kontrol)>0){ //silmek istediğimiz veri telefonda kullanılıyormu ?
    
     echo "silmek istediğiniz görev yeri rehberde kullanılıyor silemezsin.";
     
    }else{ 
    
    $sil = mysql_query("Delete from il where id = '$id'");
    if($sil)
    {
    echo "$id nolu kayıt silindi....";
    } else { 
    echo "Silinemedi.";
    }
    
    }
	
	
echo "<br><a href='gorevyerilist.php'>Görev Yeri Tanımlarına Git</a></center>";

}
?>
</body>
</html>
