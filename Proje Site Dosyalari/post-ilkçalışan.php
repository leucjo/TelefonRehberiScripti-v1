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
		mysql_query("SET NAMES 'utf8'");
		/*
		*	Veriyi Alalým ve iþlemleri yapalým
		*/
		$value = mysql_real_escape_string(strip_tags(rtrim($_POST['value'])));
		if(!$value){
			echo 'bos';
		}else{
			
			$find = mysql_query("SELECT * FROM telefon WHERE adi like '%$value%' or soyadi like '%$value%' or ceptel like '%$value%' or il like '%$value%' ");
			if(mysql_affected_rows()){
				
				while($row = mysql_fetch_assoc($find)){
					echo '<li>'.$row["adi"].' - '.$row["soyadi"].' - '.$row["ceptel"].' - '.$row["il"].'</li>';
				}
				
			}else{
				echo 'yok';
			}
		}
	}else{
		header("Location: index.php");
	}
 
?>