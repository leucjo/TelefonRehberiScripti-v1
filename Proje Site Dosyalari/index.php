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
	//Sayfalama
	
	$sayfada = 10; // sayfada gösterilecek içerik miktarını belirtiyoruz.
 
$sorgu = mysql_query("SELECT COUNT(*) AS toplam FROM telefon");
$sonuc = mysql_fetch_assoc($sorgu);
$toplam_icerik = $sonuc['toplam'];
 
$toplam_sayfa = ceil($toplam_icerik / $sayfada);
 
$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
 
if($sayfa < 1) $sayfa = 1;
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
 
$limit = ($sayfa - 1) * $sayfada;
	
	
	$fxtel=mysql_query("SELECT * FROM telefon  order by adi LIMIT $limit,$sayfada"); 
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
    echo "<tr><td colspan='3' align='center'>";
  

$sayfa_goster = 9; // gösterilecek sayfa sayısı
 
$en_az_orta = ceil($sayfa_goster/2);
$en_fazla_orta = ($toplam_sayfa+1) - $en_az_orta;
 
$sayfa_orta = $sayfa;
if($sayfa_orta < $en_az_orta) $sayfa_orta = $en_az_orta;
if($sayfa_orta > $en_fazla_orta) $sayfa_orta = $en_fazla_orta;
 
$sol_sayfalar = round($sayfa_orta - (($sayfa_goster-1) / 2));
$sag_sayfalar = round((($sayfa_goster-1) / 2) + $sayfa_orta);
 
if($sol_sayfalar < 1) $sol_sayfalar = 1;
if($sag_sayfalar > $toplam_sayfa) $sag_sayfalar = $toplam_sayfa;
 
if($sayfa != 1) echo ' <a href="?sayfa=1">&lt;&lt;İlk sayfa</a> ';
if($sayfa != 1) echo ' <a href="?sayfa='.($sayfa-1).'">&lt;Önceki</a> ';
 
for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) {
    if($sayfa == $s) {
        echo '[' . $s . '] ';
    } else {
        echo '<a href="?sayfa='.$s.'">'.$s.'</a> ';
    }
}
 
if($sayfa != $toplam_sayfa) echo ' <a href="?sayfa='.($sayfa+1).'">Sonraki&gt;</a> ';
if($sayfa != $toplam_sayfa) echo ' <a href="?sayfa='.$toplam_sayfa.'">Son sayfa&gt;&gt;</a>';

    echo "</td></tr>";
    
    
	?>
	</table>
   <table width="650" align="center"><tr><td align="left">
   <a href="yonet">Yönetim Paneline Git</a></td></tr></table>
	
</body>
</html>