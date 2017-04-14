<html>
	<head>
	<title>WFo</title>
	<h2 align=center>Weather Forecast to Campus Unisbank</h2><br>		
	</head>

<body> :
<link type="text/css" rel="stylesheet" href="style.css" /><center>
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

<div align=left>

<?php
    $json_string = file_get_contents("http://api.wunderground.com/api/a657d7d2ba430b38/forecast10day/q/ID/mugassari.json");   
    $json_a = json_decode($json_string);
	
	$json_string2 = file_get_contents("http://api.wunderground.com/api/47e99b8cefa287ed/conditions/q/ID/mugassari.json");   
    $json_b = json_decode($json_string2);
       
	   // variabel
    $periode = $json_a->{"forecast"}->{"txt_forecast"}->forecastday[0]->{'period'};
    $png = $json_a->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'icon'};
    $hari   = $json_a->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'title'};
	$infor  = $json_a->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'fcttext'};
	$daerah  = $json_b->{'current_observation'}->{'display_location'}->{'city'};
	$Kota  = $json_b->{'current_observation'}->{'observation_location'}->{'city'};
    $Neg  = $json_b->{'current_observation'}->{'display_location'}->{'state_name'};
    

        //print

	echo "<h3>Forecest in ${daerah}, ${Kota} ${Neg} </h3>";
    echo "<br>";
    echo "<img src='http://icons.wxug.com/i/c/k/" . $png . ".gif'><br/>";
    echo "Day  : ${hari}";
    echo "<br>";
	echo "Date : ".date("Y/m/d")."<br>";
    echo "Information :<br> - ${infor} \n";
	echo "<br>";

	if ($png == "clear")		{
		echo " - You will be safe to go college, because the weather is sunny today";
									}
		else 						{
		echo " - You need to bring a coat / jacket, umbrella and raincoat when going to college";
									}
?>
</div>