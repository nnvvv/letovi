<?php

    include("init.php");
    $msg = '';


    
    if(isset($_POST['login'])) {
    		require('userClass.php');
    		$user = new User($mysqli);
    		$user->login(trim($_POST['username']),trim($_POST['password']));
        if($user->getResult()){
          $msg="Uspesno ulogovan korisnik";
		  header( 'Location: rezervisi.php' );
        }else{
          $msg="Neuspešna prijava na sistem ";
        }
     }
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



<!-- Glavna sekcija -->
<section>
    <div class="container">
      <div class="row text-center header">
            <h3>Login forma</h3>
            <hr />
            <?php
              if($msg!=''){
                echo("<h3 style=color:rgb(163,65,116)> ".$msg."</h3>");
              }
            ?>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
              <form name="login" method="post" action="">

                    <div class="form-group">
                      <label for="username" class="cols-sm-2 control-label">Korisnicko ime</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Korisnicko ime"/>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="password" class="cols-sm-2 control-label">Lozinka</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input id="password" type="password" class="form-control" name="password" id="password"  placeholder="Lozinka"/>
                          </div>
                        </div>
                    </div>
                    <div class="form-group ">
                      <input type="submit" name="login" class="btn btn-custom-three " value="Login" style="background-color:rgb(163,65,116)">
                    </div>
                  </form>

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
