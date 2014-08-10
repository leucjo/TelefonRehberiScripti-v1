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
	
mysql_query("Delete from il where id = '$id'");
echo "<center>$id nolu görev yeri silindi";
echo "<br><a href='gorevyerilist.php'>Görev Yeri Tanımlarına Git</a></center>";

}
?>
</body>
</html>
