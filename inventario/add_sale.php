<?php
  $page_title = 'Agregar venta';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
   $clients = find_all('clients');
?>
<?php

  if(isset($_POST['add_sale'])){
    $req_fields = array('s_id','quantity','price','total', 'date');
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$_POST['s_id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $s_total   = $db->escape($_POST['total']);
          $date      = $db->escape($_POST['date']);
          $s_date    = make_date();
          $id_client = rand(1, 4);

          $sql  = "INSERT INTO sales (";
          $sql .= " product_id,qty,price,date,id_client";
          $sql .= ") VALUES (";
          $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}','{$id_client}'";
          $sql .= ")";

                if($db->query($sql)){
                  update_product_qty($s_qty,$p_id);
                  $session->msg('s',"Venta agregada ");
                  redirect('add_sale.php', false);
                } else {
                  $session->msg('d','Lo siento, registro falló.');
                  redirect('add_sale.php', false);
                }
        } else {
           $session->msg("d", $errors);
           redirect('add_sale.php',false);
        }
  }

?>
<?php include_once('layouts/header.php'); ?>
<?php include_once('ine.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
    <form method="post" action="ajax.php" autocomplete="off" id="sug-form">

        <div class="form-group">
          <label for="level">Cliente</label>
            <select id="s1" class="form-control" name="level">
              <?php foreach ($clients as $client ):?>
               <option value="<?php echo $client['id']; ?>"><?php echo ucwords($client['name_cli']);?></option>
            <?php endforeach;?>
            </select>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Añadir</button>
            </span>
            <input type="text" id="sug_input" class="form-control" name="title"  placeholder="Buscar por el nombre del producto">
         </div>
         <div id="result" class="list-group"></div>
        <?php include_once('activarS2.php'); ?>      
        </div>
    </form>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Editar venta</span>
       </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="add_sale.php">
        <br>
         <table class="table table-bordered">
           <thead>
            <th> Producto </th>
            <th> Precio </th>
            <th> Cantidad </th>
            <th> Total (+16% IVA) </th>
            <th> Agregado</th>
            <th> Acciones</th>
           </thead>
             <tbody  id="product_info"> </tbody>
         </table>
       </form>
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
