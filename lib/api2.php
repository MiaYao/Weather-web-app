<?php 

$json = 'https://api.forecast.io/forecast/'.$api_key.'/'.$latitude.','.$longitude.'?units='.$units; 
$json = file_get_contents($json); 
$response = json_decode($json, true); 
      
if ($response != null) {

  $lat = $response['latitude'];
  $lon = $response['longitude'];
  $tz = $response['timezone'];
  $offset = $response['offset'];

  //Current Conditions
  $curTime = $response['currently']['time'];
  $curSummary = $response['currently']['summary'];
  $curIcon = $response['currently']['icon'];
  $curPrecipProb = ($response['currently']['precipProbability'])*100;
    if (isset($response['currently']['precipType'])) {
      $curPrecipType = $response['currently']['precipType'];
    }     
  $curTemp = round($response['currently']['temperature']);
  $curFeelsLike = round($response['currently']['apparentTemperature']);
  $curHumidity = ($response['currently']['humidity'])*100;
  $curDewPoint = $response['currently']['dewPoint'];
  $curWindSpeed = $response['currently']['windSpeed'];
  $curWindBearing = $response['currently']['windBearing'];
  $curCloudCover = ($response['currently']['cloudCover'])*100;
  $curPressure = round(($response['currently']['pressure'])*0.0295301, 2);
  $curVis = round($response['currently']['visibility']);

  //Now Conditions
  $nowSumamry = $response['minutely']['summary'];
  $nowIcon = $response['minutely']['icon'];

  //Hourly Forecast
  $hourlySumamry = $response['hourly']['summary'];
  $hourlyIcon = $response['hourly']['icon'];
  $hourlyCond= array();
    foreach ($response['hourly']['data'] as $td) {
      $hourlyCond[] = $td;
    } 

  //Daily Forecast
  $dailySumamry = $response['daily']['summary'];
  $dailyIcon = $response['daily']['icon'];
  $dailyCond= array();
    foreach ($response['daily']['data'] as $d) {
      $dailyCond[] = $d;
    } 
}

?>