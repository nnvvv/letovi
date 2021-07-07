<section id="contact" >
<style>
.parallax { 
  /* The image used */
  background-image: url("assets/img/air.jpg");

  /* Full height */
  height: 500px; 


  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
} 
#contact .contact-wrapper h3 {
color:rgb(228, 79, 79);
}
</style>
<?php
$apiKey = "d2360f737f77c3db3ce7c866448ebe76";
$cityId = "5063781";

$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();

?>
<div class="parallax"></div>
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<h3 style="color:rgb(163,65,116)"> <strong> Podaci </strong> </h3>
<hr />

</div>
</div>

<div class="row animate-in" data-anim-type="fade-in-up">

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="contact-wrapper">

<div class="container">
			<div class="row">
				<div class="col-12">
    <div class="report-container">
        <h2 style="color:rgb(163,65,116)"> <strong><?php echo $data->name; ?> Weather </strong></h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>
</div>
</div>
</div>
<!-- <h3 style="color:rgb(163,65,116)"> <strong>Kontakt</strong></h3>
<style></style>
<h4><strong>E-mail : </strong> happyairline@gmail.com </h4>
<h4><strong>Broj telefona: </strong> +381 11/311-21-23 </h4> -->
</div>

</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="contact-wrapper">
<h3 style="color:rgb(163,65,116)"><strong> Kontakt i adresa </strong></h3>
<h4> E-mail : happyairline@gmail.com </h4>
<h4>Broj telefona: +381 11/311-21-23 </h4>
<h4>Aerodrom Beograd 59</h4>
<h4>Srbija</h4>
<div class="footer-div" >
&copy; 2020 </a>
</div>
</div>

</div>

</div>


</div>

</section>
