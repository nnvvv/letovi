<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
<style>

  ul li:hover {
    background-color: rgb(163,65,116);
  }

  a:active {
    background-color: rgb(163,65,116);
  }
  
  body
  {	  
	  background-color: #808080;
  }
  
  .btn-custom-one:hover {
	background-color: rgb(163,65,116);
	text-decoration: none;
	color: #11102b;
}

	.btn-custom-one {
	background-color: transparent;
	color: #11102b;
	border: 2px solidrgb(163,65,116);
	}
	
	
</style>
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="index.php">
HAPPY AIRLINE
</a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="index.php">POČETNA</a></li>
<li><a href="onama.php">O NAMA</a></li>
<li><a href="galerija.php">GALERIJA</a></li>
<li><a href="prognoza.php">VREMENSKA PROGNOZA</a></li>
<?php
  if(!empty($_SESSION['user'])){
    ?>
    <li><a href="rezervisi.php">REZERVIŠI LET</a></li>
    <?php
    if($_SESSION['user']['admin']){
      ?>
      <li><a href="admin.php">ADMINISTRATOR</a></li>
      <?php
    }
    ?>
    <li><a href="logout.php">ODJAVA SA SISTEMA </a></li>
    <?php
  }else{
    ?>
    <li><a href="register.php">REGISTRACIJA</a></li>
    <li><a href="login.php">PRIJAVA NA SISTEM</a></li>
    <?php
  }
 ?>

</ul>
</div>
<script type = "text/javascript">
  $("a").click(function(){
      $("a").css("background-color","");
      $(this).css("background-color","rgb(163,65,116)");
  });
</script>
</div>

</div>

