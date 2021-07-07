<?php

    include("init.php");
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />


<title>HappyAirline</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/ionicons.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
<link href="assets/css/animations.min.css" rel="stylesheet" />
<link href="assets/css/style-solid-black.css" rel="stylesheet" />

<link rel="shortcut icon" href="avion.png">

</head>
<body data-spy="scroll" data-target="#menu-section">

<?php

    include("meni.php");
 ?>
 <?php

     include("slider.php");
  ?>

  <!-- Glavna sekcija -->
<section>
    <div class="container">
      <div class="row text-center header">
            <h3>Vremenska prognoza</h3>
            <hr />

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
              <h1> Vremenska prognoza za Beograd narednih 10 dana:</h1>
              <div id="podaci"> </div>

            </div>
          </div>
        </div>
      </div>
</section>

<?php
    include("footer.php");

 ?>



<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/vegas/jquery.vegas.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/source/jquery.fancybox.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/appear.min.js"></script>
<script src="assets/js/animations.min.js"></script>
<script src="assets/js/custom-solid.js"></script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=<your API key>&lang=en_US" type="text/javascript"></script>
<script>
	$( document ).ready(function() {
		$.getJSON('http://api.worldweatheronline.com/premium/v1/weather.ashx?q=44.804%2C20.4651&format=json&num_of_days=10&key= 210813a5f355455396a22821200802')
		.done(function(data) {
			var text = '<ul>';
			$.each(data.data.weather, function(i, val) {
					text += '<li>'+val.date+' - maksimalna temperatura: '+val.maxtempC+' ,minimalna temperatura: '+val.mintempC+'</li>';
      });
					text+='</ul>';
					$('#podaci').html(text);
		})
		.error(function(err) { alert('Greska');
		});

	});

	</script>
  
</body>

</html>
