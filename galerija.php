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




<section id="services" >
<div class="container">
<div class="row text-center header">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">

<!-- Glavna sekcija -->
<section>
    <div class="container">
      <div class="row text-center header">
            <h3>Galerija</h3>
            <hr />

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
                <div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
                  <?php

                      $files = glob("assets/galerija/*.*");
                      //var_dump($files);
                      foreach ($files as $file) {
                        ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6 html">
                              <div class="work-wrapper">

                                <a class="fancybox-media" title="Letite sa nama" href="<?php echo $file; ?>">

                                  <img src="<?php echo $file; ?>" class="img-responsive img-rounded" alt="" />
                                </a>
                              </div>
                          </div>

                        <?php
                      }
                   ?>

                </div>

            </div>
          </div>
        </div>
      </div>
</section>

<?php

    include("meni.php");
 ?>
 <?php

     include("slider.php");
  ?>
  
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
</body>

</html>
