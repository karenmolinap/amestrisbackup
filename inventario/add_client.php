<?php
  $page_title = 'Agregar clientes';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  if(isset($_POST['add_client'])){

   $req_fields = array('full-name','direccion' );
   validate_fields($req_fields);

   if(empty($errors)){

        $name_cli   = remove_junk($db->escape($_POST['full-name']));
        $direccion   = remove_junk($db->escape($_POST['direccion']));
        $mx    = (int)$db->escape($max_id);
        $query = "INSERT INTO clients (";
        $query .="name_cli,direccion";
        $query .=") VALUES (";
        $query .="'{$name_cli}', '{$direccion}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Cliente ha sido creado");
          redirect('add_client.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo crear el cliente.');
          redirect('add_client.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_client.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
   <?php include_once('ine.php'); ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Agregar cliente</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_client.php">
            <div class="form-group">
                <label for="name_cli">Nombre</label>
                <input type="text" class="form-control" name="full-name" placeholder="Nombre completo" required>
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" name="direccion" placeholder="Direccion">
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_client" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>

      </div>
      <?php include_once('activarS2.php'); ?>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
