<?php


    include("init.php");
    require('letClass.php');
    $msg = '';


    if(isset($_POST['izmeni'])) {

    		$let = new Let($mysqli);
    		$let->izmenaLet(trim($_POST['mestoOd']),trim($_POST['type']),trim($_POST['novacena']));
        if($let->getResult()){
          $msg="Uspesno izmena leta";
        }else{
          $msg="Neuspesna izmena leta.";
        }
     }

     if(isset($_POST['unosLeta'])) {

     		$let = new Let($mysqli);
     		$let->unosLeta(trim($_POST['gradOd']),trim($_POST['gradDo']),trim($_POST['type']),trim($_POST['cena']));
         if($let->getResult()){
           $msg="Uspesno unet novi let ";
         }else{
           $msg="Neuspesno unosenje novog leta ";
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
<link href="assets/css/jquery-ui.css" rel="stylesheet" />
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
            <h3>Admin panel</h3>
            <hr />
            <?php
              if($msg!=''){
                echo("<h3> ".$msg."</h3>");
              }
            ?>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h3> Izmena  leta </h3>
            <div class="services-wrapper">
              <form name="changeLetDestinacije" method="post" action="">
                  <div class="form-group">
                      <label for="let" class="cols-sm-2 control-label">Mesto polaska</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-plane fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="mestoOd" >
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
                        <label for="type" class="cols-sm-2 control-label">Klasa</label>
                          <div class="cols-sm-10">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                              <select class="form-control" name="type" >
                                <?php
                                    $let = new Let($mysqli);
                                    $let->sveKlase();
                                    $result = $let->getResult();

                                    foreach ($result as $red ) {
                       			            $id = $red['idKlase'];
                       			            $tip = $red['nazivKlase'];
											
                                        ?>
                                        <option value="<?php echo $id;?>"><?php echo $tip;?></option>
                                        <?php
                                       }
                                       ?>
                              </select>
                            </div>
                          </div>
                      </div>
					   <div class="form-group">
                      <label for="ime" class="cols-sm-2 control-label">Nova cena karte:</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="novacena" id="novacena"  placeholder="Nova cena karte" required
                            oninvalid="this.setCustomValidity('Morate uneti novu cenu leta!')"
       oninput="this.setCustomValidity('')"/>
                          </div>
                        </div>
                    </div>
                    <div class="form-group ">
                      <input type="submit" name="izmeni" class="btn btn-custom-three  " value="Izmeni let"  style="background-color:rgb(163,65,116)">
                    </div>
                  </form>
                  <hr />

                      <div class="form-group">
                      <label for="letSearch" class="cols-sm-2 control-label">Rezervacije</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-plane fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="letSearch"  id="letSearch" onchange="search()">
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
                    <div id="tabela"> </div>
                    <hr/>
                      <form name="galerija" method="post" action="novaSlikaGalerija.php" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="file" class="cols-sm-2 control-label">Nova slika za galeriju:</label>
                            <div class="cols-sm-10">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                                <input type="file" class="form-control" name="file" placeholder="Ubacite sliku za galeriju"/>
                              </div>
                            </div>
                        </div>
                        <div class="form-group ">
                          <input type="submit" name="file" class="btn btn-custom-three " value="Ubaci"  style="background-color:rgb(163,65,116)">
                        </div>
                      </form>
                      <hr/>
                      <h3> Unos leta </h3>
                      <form name="unosLeta" method="post" action="">
                          <div class="form-group">
                              <label for="naziv" class="cols-sm-2 control-label">Grad polaska</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-plane fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="gradOd" id="gradOd"  placeholder="mesto polaska" required
                                    oninvalid="this.setCustomValidity('Morate uneti mesto polaska!')"
       oninput="this.setCustomValidity('')"/>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="drzava" class="cols-sm-2 control-label">Grad dolaska</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-plane fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="gradDo" id="gradDo"  placeholder="mesto dolaska" required 
                                    oninvalid="this.setCustomValidity('Morate uneti mesto dolaska!')"
       oninput="this.setCustomValidity('')"/>
                                  </div>
                                </div>
                            </div>
						
                     <div class="form-group">
                        <label for="type" class="cols-sm-2 control-label">Klasa</label>
                          <div class="cols-sm-10">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                              <select class="form-control" name="type" >
                                <?php
                                    $let = new Let($mysqli);
                                    $let->sveKlase();
                                    $result = $let->getResult();

                                    foreach ($result as $red ) {
                       			            $id = $red['idKlase'];
                       			            $tip = $red['nazivKlase'];
										
                                        ?>
                                        <option value="<?php echo $id;?>"><?php echo $tip;?></option>
                                        <?php
                                       }
                                       ?>
                              </select>
                            </div>
                          </div>
                      </div>
					 <div class="form-group">
                              <label for="drzava" class="cols-sm-2 control-label">Cena karte</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="cena" id="cena"  placeholder="cena karte" required
                                    oninvalid="this.setCustomValidity('Morate uneti cenu karte')"
       oninput="this.setCustomValidity('')"/>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="form-group ">
                              <input type="submit" name="unosLeta" class="btn btn-custom-three  " value="Dodaj let"  style="background-color:rgb(163,65,116)">
                            </div>
                          </form>
                          <br>
                          <hr>
                          <div id="divGrafik"></div>
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
<script src="assets/js/jquery-ui.js"></script>

<script>

		function search(){

			var event = $("#letSearch").val();
			$.ajax({
				url: "generisiPodatkeSearch.php",
				data: "id="+event,
				success: function(result){
				var text = '<table class="table"><thead><tr><th>Broj rezervacije</th><th>Relacija</th><th>Korisnik</th><th>Datum rezervacije</th><th>Cena karte</th><th>Broj sedista</th><th>Brisanje</th></tr></thead><tbody>';
				$.each($.parseJSON(result), function(i, val) {
					text += '<tr>';
					text += '<td>'+val.rezervacijaID+'</td>';
					text += '<td>'+val.mestoOd+'-'+val.mestoDo+'</td>';
					text += '<td>'+val.name+'</td>';
					text += '<td>'+val.datum+'</td>';
				//	text += '<td>'+nazivKlase+'</td>';
					text += '<td>'+val.cena+'</td>';
					text += '<td>'+val.brojSedista+'</td>';
					text += '<td><a href="obrisi.php?id='+val.rezervacijaID+'">Obrisi</a></td>';
					text += '</tr>';

					});

					text+='</tbody></table>';
					$('#tabela').html(text);
			}});
		}
    


</script>
<script>
		$( document ).ready(function() {
			search();
		});
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(grafik);

    function grafik() {
      var jsonData = $.ajax({
      url: "podaciGrafik.php",
      dataType:"json",
      async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {'title':'Broj rezervacija po klasi',
     backgroundColor: { fill:'transparent' },
	    titleTextStyle: {
		textAlign: 'center',
        color: 'white',
				fontSize: 18},
	  		'width':800,
      	'height':500,
        is3D:true,
	  legend: {
        textStyle: {
			color: 'white'
        }
    },
	  };

 var chart = new google.visualization.PieChart(document.getElementById('divGrafik'));
 function selectHandler() {
				var selectedItem = chart.getSelection()[0];
				if (selectedItem) {
					alert( data.getValue(selectedItem.row,0));
				}
			}
			google.visualization.events.addListener(chart, 'select', selectHandler);

    chart.draw(data,  options);

  }



</script>
</body>

</html>
