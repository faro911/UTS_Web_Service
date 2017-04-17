<html>
<head>
	<title>WFo</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php

	echo "<center><h1>Ramalan Cuaca 1 Minggu</h1></center>

	<table cellspacing='0' >
		<thead>
			<tr>
				<th width= 184px >Hari</th>
				<th width= 910px >Informasi</th>
				<th width= 200px >Ramalan Cuaca</th>
			</tr>
		</thead>";
		
for($peri=0;$peri<=13;$peri++){
	
		    $json_string = file_get_contents("http://api.wunderground.com/api/a657d7d2ba430b38/forecast10day/q/ID/mugassari.json");   
			$json_a = json_decode($json_string);

			// variabel
			$peri = $json_a->{'forecast'}->{'txt_forecast'}->forecastday[$peri]->{'period'};
	
			$png = $json_a->{'forecast'}->{'txt_forecast'}->forecastday[$peri]->{'icon'};
			$hari   = $json_a->{'forecast'}->{'txt_forecast'}->forecastday[$peri]->{'title'};

echo "
	<table cellspacing='0'>
		<tbody>
			<tr>";
		if ($hari == "Sunday")		{
		echo "<td width= 200px >Minggu</td>";
									}
		else if ($hari == "Sunday Night"){
		echo "<td width= 200px >Minggu Malam</td>";
									}
		else if ($hari == "Monday"){
		echo "<td width= 200px >Senin</td>";
									}
		else if ($hari == "Monday Night"){
		echo "<td width= 200px >Senin Malam</td>";
									}
		else if ($hari == "Tuesday"){
		echo "<td width= 200px >Selasa</td>";
									}
		else if ($hari == "Tuesday Night"){
		echo "<td width= 200px >Selasa Malam</td>";
									}
		else if ($hari == "Wednesday"){
		echo "<td width= 200px >Rabu</td>";
									}
		else if ($hari == "Wednesday Night"){
		echo "<td width= 200px >Rabu Malam</td>";
									}
		else if ($hari == "Thursday"){
		echo "<td width= 200px >Kamis</td>";
									}
		else if ($hari == "Thursday Night"){
		echo "<td width= 200px >Kamis Malam</td>";
									}
		else if ($hari == "Friday"){
		echo "<td width= 200px >Jumat</td>";
									}
		else if ($hari == "Friday Night"){
		echo "<td width= 200px >Jumat Malam</td>";
									}
		else if ($hari == "Saturday"){
		echo "<td width= 200px >Sabtu</td>";
									}
		else 						{
		echo "<td width= 200px >Sabtu Malam</td>";
									}

		if ($png == "clear")		{
		echo "<td width= 900px align= left >Cuaca hari ini sangat cerah, anda bisa aman berpergian hari ini</td>";
									}
		else if ($png == "partlycloudy"){
		echo "<td width= 900px align= left >Untuk Berjaga - jaga, bawalah mentel/jaket saat berpergian</td>";
									}
		else if ($png == "cloudy"){
		echo "<td width= 900px align= left >Cuaca berawan, hari ini tidak terlalu panas</td>";
									}
		else if ($png == "mostlycloudy"){
		echo "<td width= 900px align= left >Cuaca mulai mendung, bawalah jaket saat berpergian</td>";
									}
		else 						{
		echo "<td width= 900px align= left >Anda perlu membawa mantel/jaket, payung dan jas hujan</td>";
									}
				//<td width= 900px align= left >$infor</td>
		echo "<td width= 200px ><img src='http://icons.wxug.com/i/c/k/" . $png . ".gif'></td>
			</tr>
		</tbody>
	</table>";					
	}
?>

</body>
</html>
