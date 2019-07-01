<?php
  $page_title = 'Editar Cliente';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_client = find_by_id('clients',(int)$_GET['id']);
  if(!$e_client){
    $session->msg("d","Missing client id.");
    redirect('clients.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    $req_fields = array('name_cli','direccion');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_client['id'];
           $name_cli = remove_junk($db->escape($_POST['name_cli']));
       $direccion = remove_junk($db->escape($_POST['direccion']));
            $sql = "UPDATE clients SET name_cli ='{$name_cli}', direccion ='{$direccion}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Se ha actualizado el cliente ");
            redirect('edit_client.php?id='.(int)$e_client['id'], false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('edit_client.php?id='.(int)$e_client['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_client.php?id='.(int)$e_client['id'],false);
    }
  }
?>

<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
   <?php include_once('ine.php'); ?>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Actualiza cuenta <?php echo remove_junk(ucwords($e_client['name_cli'])); ?>
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_client.php?id=<?php echo (int)$e_client['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="name_cli" class="control-label">Nombres</label>
                  <input type="name_cli" class="form-control" name="name_cli" value="<?php echo remove_junk(ucwords($e_client['name_cli'])); ?>">
            </div>
            <div class="form-group">
                  <label for="direccion" class="control-label">Direccion</label>
                  <input type="text" class="form-control" name="direccion" value="<?php echo remove_junk(ucwords($e_client['direccion'])); ?>">
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Actualizar</button>
            </div>
        </form>
       </div>
     </div>
  </div>
  <?php include_once('activarS2.php'); ?>
 </div>
<?php include_once('layouts/footer.php'); ?>
