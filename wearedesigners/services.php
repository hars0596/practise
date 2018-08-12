<?php
  include "db/Database.php";
  $conn=getConn();
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WAD - Services</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css\wad.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <?php include "include/header.php" ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Services </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Services</li>
      </ol>

      <!-- Image Header -->
      <img style="width:100%;height:300px;" class="img-fluid rounded mb-4" src="images/other/services1.jpg" alt="">
      <!-- Marketing Icons Section -->
      <div class="row">
        <?php

          $sql="SELECT * from our_services";
          $result = mysqli_query($conn, $sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               echo '
               <div class="col-lg-4 mb-4">
                 <div class="card h-100">
                   <h4 class="card-header">'.$row['title'].'</h4>
                   <div class="card-body">
                     <p class="card-text">
                      '.$row['des'].'
                     </p>
                   </div>
                   <div class="card-footer">
                     <a href="#" class="btn btn-primary">Learn More</a>
                   </div>
                 </div>
               </div>
               ';
            }
          }
        ?>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
      include "include/footer.php";
    ?>

  </body>

</html>
