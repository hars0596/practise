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

    <title>WAD - about</title>

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
      <h1 class="mt-4 mb-3">About Us
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>

      <!-- Intro Content -->
      <div class="row">
        <div class="col-lg-6">
          <img style="width:100%; height:350px;" class="img-fluid rounded mb-4" src="images/about/main.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <h2>About WAD</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Team Members -->
      <h2>Our Team</h2>

      <div class="row">

        <?php
          $sql="SELECT * from our_team";
          $result = mysqli_query($conn, $sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               echo '
               <div class="col-lg-4 mb-4">
                 <div class="card h-100 text-center">
                   <img style="width:100%;height:280px;" class="card-img-top" src="'.$row['img_path'].'" alt="">
                   <div class="card-body">
                     <h4 class="card-title">'.$row['name'].'</h4>
                     <h6 class="card-subtitle mb-2 text-muted">'.$row['position'].'</h6>
                     <p class="card-text">'.$row['des'].'</p>
                   </div>
                   <div class="card-footer">
                     <a href="#">'.$row['email'].'</a>
                   </div>
                 </div>
               </div>
               ';
            }
          }
        ?>
      </div>
      <!-- /.row -->

      <!-- Our Customers -->

      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
        include "include/footer.php";
    ?>

  </body>

</html>
