<?php

    include("init.php");
    $msg = '';


    if(isset($_POST['register'])) {
    		require('userClass.php');
    		$user = new User($mysqli);
    		$user->registracijaKorisnika(trim($_POST['name']),trim($_POST['username']),trim($_POST['password']),trim($_POST['telephone']));
        if($user->getResult()){
          $msg="Uspesno registrovan korisnik";
        }else{
          $msg="Neuspesna registracija korisnika ";
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


<title>Flight booking</title>
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
            <h3>Registracija</h3>
            <hr />
            <?php
              if($msg!=''){
                echo("<h3  style=color:rgb(163,65,116)> ".$msg."</h3>");
              }
            ?>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
              <form name="registracija" method="post" action="">
                  <div class="form-group">
                      <label for="name" class="cols-sm-2 control-label">Ime i prezime</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name"  id="name"  placeholder="Ime i prezime" required="required"     oninvalid="this.setCustomValidity('Morate uneti ime i prezime')"
       oninput="this.setCustomValidity('')"
                           />
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="username" class="cols-sm-2 control-label">Korisnicko ime</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username"  id="username"  placeholdbacler="Korisnicko ime" required  
                             oninvalid="this.setCustomValidity('Morate uneti korisničko ime')"
                             oninput="this.setCustomValidity('')"/>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="password" class="cols-sm-2 control-label">Lozinka</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input id="password" type="text" class="form-control" name="password" id="password"  placeholder="Lozinka"
                           
      />
      
                            </div>
                        </div> 
                    </div>
                    <br>
                    <button type="button" class="btn btn-default btn-md text-left" id="generisiLozinku" style="float:left; color:#ffffff; background-color:rgb(163,65,116) ">Generisi lozinku</button>
                    <br><br>
                    <div class="form-group">
                      <label for="telephone" class="cols-sm-2 control-label">Broj telefona</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="telephone" id="telephone"  placeholder="Broj telefona"required     oninvalid="this.setCustomValidity('Morate uneti broj telefona!')"
       oninput="this.setCustomValidity('')"/>
                          </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group ">
                      <input type="submit" name="register" class="btn btn-custom-three" value="Registruj se" style="background-color:rgb(163,65,116)">
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
<script>

$(document).ready(function() {

	$('#generisiLozinku').click(function() {

		$.ajax({
		  url: 'lozinka.php',
		  dataType: 'json',
		  success: function(json) {


		  		$('#password').val(json);


		  },
			error: function(json) {
		  	console.log(json,password +' error');


		  }
		});

	});

});
</script>
</body>

</html>
