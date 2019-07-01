<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <h1>¡Bienvenido a Amestris!</h1>
         <h3>En el menú lateral podrá encontrar las opciones disponibles para navegar por el sistema de inventario.</h3>
         <img src="libs/css/img/amestris-logo.png" width="120px">     
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
