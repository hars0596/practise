<?php
  include "db/Database.php";
  $conn=getConn();
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>WAD - Pricing</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css\wad.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <?php include "include/header.php"; ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Pricing</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Pricing</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <?php
          $sql="SELECT * from pricing";
          $result = mysqli_query($conn, $sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               echo '
                       <div class="col-lg-4 mb-4">
                         <div class="card">
                           <h3 class="card-header">'.$row['type'].'</h3>
                           <div class="card-body">
                             <div class="display-4">$'.$row['price'].'</div>
                             <div class="font-italic">per website/app</div>
                           </div>
                           <ul class="list-group list-group-flush">
                            ';
                      $give=explode("&",$row['give']);
                      for($i=0;$i<sizeof($give);$i++){
                        echo '<li class="list-group-item">'.$give[$i].'</li>';
                      }
                          echo '</ul>
                         </div>
                       </div>
               ';
            }
          }
        ?>
      </div>
      <!-- /.row -->
      <br/>
      <hr/>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
        include "include/footer.php";
    ?>

  </body>

</html>
