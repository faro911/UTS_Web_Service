<html>
	<head>
	<title>WFo</title>
	<h2 align=center>Ramalan Cuaca</h2><br>	
<style type="text/css">
body { font-family: Arial; }
p { font-family: Courier, monospace; }
div { font-family: “Duru Sans”, Verdana, sans-serif; }
</style>	
	</head>

<body> :
<link type="text/css" rel="stylesheet" href="style2.css" /><center>
<div id="clockDisplay" class="clockStyle">

</div>
<script type="text/javascript" language="javascript">
function renderTime(){
 var currentTime = new Date();
 var h = currentTime.getHours();
 var m = currentTime.getMinutes();
 var s = currentTime.getSeconds();
 if (h == 0){
  h = 24;
   }
   if (h < 10){
    h = "0" + h;
    }
    if (m < 10){
    m = "0" + m;
    }
    if (s < 10){
    s = "0" + s;
    }
 var myClock = document.getElementById('clockDisplay');
 myClock.textContent = h + ":" + m + ":" + s + "";    
 setTimeout ('renderTime()',1000);
 }
 renderTime();
</script>	

<div align=center>

<?php
    $json_string = file_get_contents("http://api.wunderground.com/api/a657d7d2ba430b38/forecast10day/q/ID/mugassari.json");   
    $json_a = json_decode($json_string);
	
	$json_string2 = file_get_contents("http://api.wunderground.com/api/47e99b8cefa287ed/conditions/q/ID/mugassari.json");   
    $json_b = json_decode($json_string2);
       
	   // variabel
    $png = $json_a->{'forecast'}->{'simpleforecast'}->forecastday[0]->{'icon'};
	$con = $json_a->{'forecast'}->{'simpleforecast'}->forecastday[0]->{'conditions'};
	$Hc = $json_a->{'forecast'}->{'simpleforecast'}->forecastday[0]->{'high'}->{'celsius'};
	$Lc = $json_a->{'forecast'}->{'simpleforecast'}->forecastday[0]->{'low'}->{'celsius'};
	$mph = $json_a->{'forecast'}->{'simpleforecast'}->forecastday[0]->{'avewind'}->{'mph'};
	$kph = $json_a->{'forecast'}->{'simpleforecast'}->forecastday[0]->{'avewind'}->{'kph'};
	$dir = $json_a->{'forecast'}->{'simpleforecast'}->forecastday[0]->{'avewind'}->{'dir'};
	$daerah  = $json_b->{'current_observation'}->{'display_location'}->{'city'};
	$Kota  = $json_b->{'current_observation'}->{'observation_location'}->{'city'};
    $Neg  = $json_b->{'current_observation'}->{'display_location'}->{'state_name'};
    

        //print
		
echo "<br><br>";		
echo "Ramalan Cuaca di ${daerah} ,${Kota} ${Neg}";
echo "";
echo "<table border =0>
<tr>
<td align=center bgcolor=#FFF8DC><img src='http://icons.wxug.com/i/c/k/" . $png . ".gif' widht=100px height= 100px></td>
<td align=center bgcolor=#E6E6FA><font size = 10 color=red>$Hc <sup><font size= 5><sup>o</sup> C</font></sup></font></td>
<td align=center bgcolor=#FFF8DC>arah angin<br><font size = 10>$dir</td>
</tr>
<tr>
<td align=center bgcolor=#E6E6FA><font size = 1 >$con</font></td>
<td align=center bgcolor=#FFF8DC><font size = 1 >Suhu terendah <font color=red>$Lc <sup>o</sup> C</font></td>
<td align=center bgcolor=#E6E6FA><font size = 1 >Kec. Angin ${mph} /mph, ${kph} /kph</td>
</tr>
</table>";
									?>
<br><br>

			<form action="cuacainfo.php" method="get">
			<input class="btnForm" type="submit" name="submit" value="Prakira Cuaca 12 Jam ke depan"/>
			</form>
			<form action="cuacainfo1minggu.php" method="get">
			<input class="btnForm" type="submit" name="submit" value="Prakira Cuaca 1 Minggu kedepan"/>
			</form>
									
</div>

			
	