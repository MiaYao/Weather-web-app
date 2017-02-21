<?php
  include('lib/api.php');

  $latitude = $_POST['lat'];
  $longitude = $_POST['lng'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];

  $api_key = '7c6de8ad083fbcc790510cf20fc019e8';
  $units = 'auto';  // Can be set to 'us', 'si', 'ca', 'uk' or 'auto' (see forecast.io API); default is auto
  $lang = 'en'; // Can be set to 'en', 'de', 'pl', 'es', 'fr', 'it', 'tet' or 'x-pig-latin' (see forecast.io API); default is 'en'
  require('lib/api2.php');
  $forecast = new ForecastIO($api_key, $units, $lang);
  date_default_timezone_set("Canada/Eastern");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
  <!--<meta http-equiv="refresh" content="60" >-->
  <title>Mia Weather</title>
  <meta charset="us-ascii">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  
  <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script></head>

  <!-- customer stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/index_stylesheet.css" />
 
  <!--Bootstrap social media icons -->
  <link type="text/css" rel="stylesheet" href="css/bootstrap-social.css" />
  <script src="https://use.fontawesome.com/607b41fc1f.js"></script>

  <!--Bootstrap weather icons -->
  <link type="text/css" rel="stylesheet" href="css/weather-icons.min.css" />
</head>

<body>
  <?php require 'layout/nav.php' ?>
  <div class="background-wrap">
    <video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted"> 
      <source src="images/video1.mp4" type="video/mp4">
    </video>         
    
    <div class="content container-fluid">
    <?php
      /* GET CURRENT CONDITIONS */
      $condition = $forecast->getCurrentConditions($latitude, $longitude);
      /* GET HOURLY CONDITIONS FOR TODAY */
      $conditions_today = $forecast->getForecastToday($latitude, $longitude);

      /* GET DAILY CONDITIONS FOR NEXT 7 DAYS */
      $conditions_week = $forecast->getForecastWeek($latitude, $longitude);
    ?>
      <div class="row" >

        <div id="middleL" class="col-lg-4 col-sm-3">
          <?php echo $curSummary."<br>";
            ?>
            <canvas class="<?php echo $curIcon; ?> iconLg"></canvas>
            
        </div>

        <div id="middleM" class="col-lg-4 col-sm-4"> 
          <?php
            echo "<h4> ".$condition->getTime('l, F dS , Y')."</h4><br>";
          echo "<h3> ".$condition->getTime('g:i A')."</h3>";
          $tem = $condition->getTemperature();
          if($tem == -0){
            $tem =0;
          }
          echo '<span style="font-size:10em;"> '.$tem. "&deg;</span>";
          
          echo '<h4>Feels Like:'.$curFeelsLike."&deg;</h4>";
          ?>
          <h5><span><?php echo $city.', '.$state ?></span></h5><br>
        </div>
        <div id="middleR" class="col-lg-4 col-sm-4">
          <?php
            /*Get Wind and Humidity conditions*/
            echo '<div class="detail col-xs-6"><i class="wi wi-cloudy weatherIcons1"></i> '.$condition->getCloudCover()." &#37;</div>";
            echo '<div class="detail col-xs-6"><i class="wi wi-cloudy-gusts weatherIcons1"></i> '.$curWindSpeed." mph</div><br>";
            echo '<div class="detail col-xs-6"><i class="wi wi-humidity weatherIcons1"></i> '.$curHumidity."&#37;</div>";
            echo '<div class="detail col-xs-6"><i class="wi wi-night-rain weatherIcons1"></i> '.$curPrecipProb."&#37;</div><br>";

            $ti = 1;
            foreach ($dailyCond as $cond) {
              $tSunRise = date('g:i ',$cond['sunriseTime']);
              $tSunSet = date('g:i ',$cond['sunsetTime']);
            if ($ti++ == 1) break;  
            }
            echo '<div class="detail col-xs-6"><i class="wi wi-sunrise weatherIcons1"></i> '.$tSunRise."</div>";
            echo '<div class="detail col-xs-6"><i class="wi wi-sunset weatherIcons1"></i> '.$tSunSet."</div><br>";
            //print_r(array_values($dailyCond));
          ?>

        </div>
      </div>
    </div>
    <?php require('layout/daily.php') ?>
  </div>
  <?php require('layout/footer.php') ?>


<!--For skycons display-->
<script src="js/skycons.js"></script>
<script src="js/skycons_display.js"></script>
<script src="js/autocomplete.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA28OjYnnhoa4DsZwGd8EPzRLKpLZhXQUQ&libraries=places&callback=initAutocomplete"
        async defer></script>


</body>
</html>
