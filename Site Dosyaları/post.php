<?php
  
	if($_POST){
	
		/*
		*	Mysql Connect
		*/
		
		/*$connx = mysql_connect("localhost","root") or die(mysql_error());
		$dbConnx = mysql_select_db("test", $connx) or die(mysql_error());
		*/
		include "db.php";
		/* ---------------- **/
		mysql_query("SET NAMES 'utf8'"); //TÜRKÇE KARAKTER HATASINI DÜZENLÝYORUM.
		/*
		*	Veriyi Alalým ve iþlemleri yapalým
		*/
		$value = mysql_real_escape_string(strip_tags(rtrim(ltrim($_POST['value']))));
		
		//if (strlen($value) > 2){ 
		if(!$value)
		{
			echo 'bos';
		}
		else
		{
		 if (strlen($value) > 1){ //ikiden fazla harf girildiyse arasýn.
		 
		 
			$find = mysql_query("SELECT x.adres as xadres, x.adi AS xad, x.soyadi AS xsoyad, x.ceptel AS xceptel, x.evtel AS xevtel, y.adi AS yadi
FROM telefon x, il y
WHERE x.il = y.id and (x.adres like '%$value%' or x.adi like '%$value%' or x.soyadi like '%$value%' or x.ceptel like '%$value%' or y.adi like '%$value%')");
			//$find = mysql_query("SELECT * FROM telefon WHERE adi like '%$value%' or soyadi like '%$value%' or ceptel like '%$value%' or il like '%$value%' ");
			$sirano=0;
			if(mysql_affected_rows())
			{
			echo '<table border bordercolor="#000000" style="border:0px dashed" cellpadding="5" cellspacing="2">';
			while($row = mysql_fetch_assoc($find))
			{
			$sirano++;
			echo "<tr bgcolor='#ffffff'
			onMouseOver=\"this.style.backgroundColor='#b30016';this.style.color='#ffffff';\"
			onMouseOut=\"this.style.backgroundColor='#ffffff';this.style.color='#000000';\">";
			echo '<td>'.$sirano.'.</td><td> '.$row["xad"].' '.$row["xsoyad"].'</td> <td>'.$row["xceptel"].'</td> <td>'.$row["yadi"].'</td>';
			echo "</tr>";
			}
			echo "</table>";
			}
			else
			{
				echo 'yok';
			}
	
	 
	 } 
	 else
	 {
	 echo '<font color=blue><b><i>En az 2 Karakter Girin!</i></b></font>';
	 }
	 }
	
	
	
	}else{ //eðer post edilmemiþse.
		header("Location: index.php");
	}
 
?>