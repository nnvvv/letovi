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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
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
  <h3>Letovi</h3>
  <hr />

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="services-wrapper">
    <?php
        include("letClass.php");
         $let = new Let($mysqli);
        $let->sviLetovi();
        $result = $let->getResult();


	       if(count($result) >0) {
           ?>
            <table class="table" >
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Mesto polaska</th>
                  <th class="text-center">Mesto dolaska</th>
                  <th class="text-center">Klasa</th>
				  <th class="text-center">Cena</th>
                </tr>
              </thead>
              <tbody >
           <?php

		         foreach ($result as $red ) {
			            $id = $red['id'];
			            $mestoOd = $red['mestoOd'];
                  $mestoDo= $red['mestoDo'];
                  $klasa= $red['nazivKlase'];
				  $cena= $red['cena'];
                  ?>
                  <tr style="color: #fff; background:rgb(163,65,116)">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $mestoOd; ?></td>
                    <td><?php echo $mestoDo; ?></td>
                    <td><?php echo $klasa; ?></td>
					<td><?php echo $cena; ?></td>
                  </tr>


                  <?php

		         }

             ?>
           </tbody>
         </table>
             <?php
	     }else{
          ?>
          <h1> Trenutno nemamo letova u ponudi </h1>
         <?php
       }

     ?>

  </div>
  </div>
  </div>
  </div>
</section>

<section id="services" >
<div class="container">
<div class="row text-center header">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
<h3>Ponuda</h3>
<hr />
</div>
</div>
<div class="row animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-document"></i>
<h3>Rezervacije</h3>
U bilo koje doba dana ili noći, iz udobnosti Vašeg doma, možete rezervisati let preko našeg sajta!
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-home"></i>
<h3>Najbolja ponuda letova</h3>
Na našem sajtu možete videti  najbolju i najveću ponudu letova iz celog sveta!
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-briefcase"></i>
<h3>Najpovoljnije cene letova</h3>
Garantujemo  Vam veoma visok kvalitet letova, po najpovoljnijim mogućim cenama!
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
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <script>
     $(document).ready(function() {
            $('.table').DataTable();
        } );
    </script>
</body>

</html>
