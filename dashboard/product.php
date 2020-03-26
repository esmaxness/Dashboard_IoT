<?php

include('pserver.php');

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>SB Admin - Start Bootstrap Template</title>
        
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
    </head>
    
    
    <body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registrar Peso</div>
        <div class="card-body">
          <form method="post" action="product.php">
              <div class="form-group">
                                <label>Fecha</label>
                                <input type="text" class="form-control" name="pfecha" required>
                            </div>
              <div class="form-group">
                                <label>Peso</label>
                                <input type="text" class="form-control"  name="ppeso" required>
                            </div>
              <div class="form-group">
                  <label>Musculo</label>
                  <input type="text" class="form-control" name="pmusculo" required>
              </div>
              <div class="form-group">
                  <label>Porcentaje Grasa</label>
                  <input type="text" class="form-control" name="pgrasa" required>
              </div>
              <button type="submit" class="btn btn-primary" name="reg_p">Submit</button>
              <a class="btn btn-primary" href="index.php">Cancelar</a>
            </form>
    

        </div>
      </div>
        </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    </body>

</html>