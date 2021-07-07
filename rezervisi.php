<?php

    include("init.php");
    require('letClass.php');
    $msg = '';


    if(isset($_POST['rezervisi'])) {

    		$let = new Let($mysqli);
    		$let->rezervacija(trim($_POST['letId']),trim($_POST['datum']),trim($_POST['brSedista']));
        if($let->getResult()){
          $msg="Uspesno rezervisano";
        }else{
          $msg="Neuspesna rezervacija ! Broj sedista mora biti u opsegu 1-50";
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

<title>LetLine</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/ionicons.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
<link href="assets/css/animations.min.css" rel="stylesheet" />
<link href="assets/css/style-solid-black.css" rel="stylesheet" />
<link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="shortcut icon" href="avion.png">
</head>
<body data-spy="scroll" data-target="#menu-section">



<!-- Glavna sekcija -->
<section>
    <div class="container">
      <div class="row text-center header">
            <h3>Rezervacija leta</h3>
            <hr />
            <?php
              if($msg!=''){
                echo("<h3 style=\"color:rgb(204,0,153)\">".$msg."</h3>");
              }
            ?>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
              <form name="rezervacija" method="post" action="">
                  <div class="form-group">
                      <label for="let" class="cols-sm-2 control-label"> Relacije </label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-plane fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="letId" >
                              <?php
                                  $let = new Let($mysqli);
                                  $let->sviLetovi();
                                  $result = $let->getResult();

                                  foreach ($result as $red ) {
                     			            $id = $red['id'];
                     			            $mestoOd = $red['mestoOd'];
											$mestoDo = $red['mestoDo'];
											
                                      ?>
                                      <option value="<?php echo $id;?>"><?php echo $mestoOd.' - '.$mestoDo;?></option>
                                      <?php
                                     }
                                     ?>
                            </select>
                          </div>
                        </div>
						
                    </div>
				

                    <div class="form-group">
                      <label for="date" class="cols-sm-2 control-label">Datum</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
                            <input id="datepicker" type="text" class="form-control" name="datum" id="datum"  placeholder="Datum" required
                            oninvalid="this.setCustomValidity('Morate izabrati datum')"
                            onvalid="this.setCustomValidity('')" />
                          </div>
                        </div>
                    </div>
					 <div class="form-group">
                              <label for="drzava" class="cols-sm-2 control-label">Broj sedista</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="brSedista" id="brSedista"  placeholder="Broj sedista"/>
                                  </div>
                                </div>
                            </div>
                    <div class="form-group ">
                      <input type="submit" name="rezervisi" class="btn btn-custom-three  " value="Rezervisi" style="background-color:rgb(163,65,116)">
                    </div>
                  </form>

            </div>
          </div>
        </div>
      </div>
</section>

<?


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
<script src="assets/js/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
</body>

</html>
