<html>
<head>
	<title>WFo</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php

	echo "<center><h1>Ramalan cuaca 12 Jam ke depan</h1></center>

	<table cellspacing='0' >
		<thead>
			<tr>
				<th width= 85px>Jam</th>
				<th width= 50px>Temp</th>
				<th width= 50px>Pict</th>
				<th width= 200px>Kondisi</th>
				<th>Kec Angin</th>
				<th width= 50px>Arah Angin</th>
			</tr>
		</thead>";
		
for($tm=0;$tm<=12;$tm++){
	
		    $json_string2 = file_get_contents("http://api.wunderground.com/api/47e99b8cefa287ed/hourly/q/ID/mugassari.json");   
			$json_b = json_decode($json_string2);

			// variabel
			$jam = $json_b->hourly_forecast[$tm]->{'FCTTIME'}->{'civil'};
			$temp = $json_b->hourly_forecast[$tm]->{'temp'}->{'metric'};
			$png2 = $json_b->hourly_forecast[$tm]->{'icon'};
			$cont = $json_b->hourly_forecast[$tm]->{'condition'};
			$spda = $json_b->hourly_forecast[$tm]->{'wspd'}->{'metric'};
			$arha = $json_b->hourly_forecast[$tm]->{'wdir'}->{'dir'};
			
			
			

echo "
	<table cellspacing='0'>
		<tbody>
			<tr>
				<td width= 100px>$jam</td>
				<td width= 50px>${temp} <sup>o</sup>C</td>
				<td><img src='http://icons.wxug.com/i/c/k/" . $png2 . ".gif'></td>
				<td width= 200px>$cont</td>
				<td width= 80px>${spda} Km/h</td>
				<td width= 50px>$arha</td>
			</tr>
		</tbody>
	</table>";									
	}

?>


</body>
</html>