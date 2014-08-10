<?php
include "db.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
	<title>Bozok Hastane Dahili Rehber</title>
	<link rel="stylesheet" href="stil.css"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
		$(function(){
		
			$("#sonuclar").hide();
			
			// Tıklandığında işlem  yap
			$(".input").keyup(function(){
				
				// Veriyi alalım
				var value = $(this).val();
				var deger = "value="+value;
				
				$.ajax({
					
					type: "POST",
					url: "post.php",
					data: deger,
					success: function(cevap){
						if(cevap == "yok"){
							$("#sonuclar").show().html("");
							$("#sonuclar").html("<font color='#ff0000'><b><blink>Hiç bir sonuç bulunamadı!!</blink></b></font>");
						}else if(cevap == "bos"){
							$("#sonuclar").hide();
						}else {
							
							$("#sonuclar").show();
							$("#sonuclar").html(cevap);
							
						}
					}	
					
				})
				
			});
		
		});
	</script>
</head>
<body>
	
	<!-- Ortala -->
	<div id="ortala">
		
	
		<input type="text"
		value="Bu Alana Arama Kriterinizi Giriniz..."
		onfocus="if(this.value == 'Bu Alana Arama Kriterinizi Giriniz...'){this.value = '';}"
		onblur="if(this.value == ''){this.value = 'Bu Alana Arama Kriterinizi Giriniz...';}"
		name="eftal" class="input" />
		
		<div id="sonuclar"><ul></ul></div>
	
	</div>
	<!--#Ortala -->
	
	<table width="650" align="center" style="border:1px dashed"><tr><td>
<font size="3" color="#b30016">Bozok Hastane Dahili Rehber</font>
</td>
<td align="right">
</td>
</font></table><br>
  <table border bordercolor="#000000" width="650" align="center" style="border:0px dashed">
     <tr>
       <th width="200" style="background-color:#b3df27" scope="col">İsim Soyisim</th>
       <th width="60" style="background-color:#b3df27" scope="col">Dahili No</th>
     <!-- <th width="150" style="background-color:#b3df27" scope="col">Mail Adres</th> -->
       <th width="250" style="background-color:#b3df27" scope="col">Görev Yeri</th>
      
     </tr>

	<?php
	$fxtel=mysql_query("select * from telefon order by adi"); 
   while ($fxz=mysql_fetch_array($fxtel))  {
   echo "<tr bgcolor='#ffffff' onMouseOver=\"this.style.backgroundColor='#b30016';this.style.color='#ffffff';\" onMouseOut=\"this.style.backgroundColor='#ffffff';this.style.color='#000000';\">
       <td>".$fxz['adi']." ".$fxz['soyadi']."</td>
       <td>".$fxz['ceptel']."</td>";
      // <td>".$fxz['evtel']."</td>
      echo "<td>";
       $fxil=mysql_fetch_array(mysql_query("select * from il where id=".$fxz['il'].""));
       echo "".$fxil['adi']."";
       echo "</td>
     </tr>";
    }
	?>
	</table>
   <table width="650" align="center"><tr><td align="left"><a href="yonet">Yönetim Paneline Git</a></td></tr></table>
	
</body>
</html>