<?php
  include "db/Database.php";
  $conn=getConn();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WAD - FAQs</title>

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
      <h2 class="mt-4 mb-3">FAQs</h2>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">FAQ</li>
      </ol>

      <div class="mb-4" id="accordion" role="tablist" aria-multiselectable="true">

        <?php
          $sql="SELECT * from faqs";
          $result = mysqli_query($conn, $sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               echo '
               <div class="card">
                 <div class="card-header" role="tab" id="heading'.$row['id'].'">
                   <h5 class="mb-0">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row['id'].'" aria-expanded="true"
                     aria-controls="'.$row['id'].'">'.$row['question'].'</a>
                   </h5>
                 </div>
                 <div id="collapse'.$row['id'].'" class="collapse show" role="tabpanel" aria-labelledby="'.$row['id'].'">
                   <div class="card-body">
                    '.$row['ans'].'
                   </div>
                 </div>
               </div>

               ';
            }
          }
        ?>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
      include "include/footer.php";
    ?>
  </body>

</html>
