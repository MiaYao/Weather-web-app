<!--Daily Forecast-->
<div class="content-weekly">
	<div class="row" style="margin-top:2%;">
	<?php
		$i = 0;
		$count = 0;
		foreach ($dailyCond as $daily) {
			
			if ($count++ == 0) continue;
			$dTime = date('l, M jS', $daily['time']);
			$dSummary = $daily['summary'];
			$dIcon = $daily['icon'];
			$dSunrise = date('g:i ', $daily['sunriseTime']);
			$dSunset = date('g:i ', $daily['sunsetTime']);
			$dPreciProbility = $daily['precipProbability'];
			$dTemperatureMin = $daily['temperatureMin'];
			$dTemperatureMax = $daily['temperatureMax'];
			$dHumidity = $daily['humidity'];
			$dWindSpeed= $daily['windSpeed'];
			$cloudCover = $daily ['cloudCover']*100;
?>
		<div class="col-lg-4 col-sm-6 col-xs-6 dailyInfo">
			<div class="panel panel-transparent">
  				<div class="panel-heading">
    				<h3 class="panel-title"><?php echo $dTime ?></h3>
  				</div>
  				<div class="panel-body">
    				<div class="icons">
    					<canvas class="<?php echo $dIcon; ?>" width="60" height="60"></canvas>
    				</div>
    				<div class="contents">
    					<div>
    						<span style="color:#ff3300; font-size:1.5em;"><?php echo $dTemperatureMax ?> &deg</span>
    						&nbsp; &nbsp; &nbsp; &nbsp;
    						<span style="color:#73879C; font-size:1.5em;"><?php echo $dTemperatureMin ?> &deg</span>
    					</div>
    					<div>
    						<?php
    							echo '<div class="detail1"><i class="wi wi-sunrise weatherIcons"></i> '.$dSunrise."</div>";
    							echo '<div class="detail1"><i class="wi wi-sunset weatherIcons"></i> '.$dSunset.'</div>';
    							echo '<div class="detail1"><i class="wi wi-night-rain weatherIcons"></i> '.$dPreciProbility."</div>";
    							echo '<div class="detail1"><i class="wi wi-humidity weatherIcons"></i> '.$dHumidity."</div>";
    							echo '<div class="detail1"><i class="wi wi-cloudy-gusts weatherIcons"></i> '.$dWindSpeed."</div>";
    							echo '<div class="detail1"><i class="wi wi-cloudy weatherIcons"></i> '.$cloudCover."</div>";
    						?>
    					</div>
    				</div>
  				</div>
			</div>
		</div>

<?php
		$i++;
		if ($i> 5) break;
	}
?>
  </div>
</div>
