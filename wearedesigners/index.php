<?php
  include "db/Database.php";
  $conn=getConn();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WAD-Home</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css\wad.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <?php include "include/header.php" ?>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <?php
              $sql="SELECT count(*) as count from home_slider_images";
              $result = mysqli_query($conn, $sql);
              $row = $result->fetch_assoc();
              for($i=1;$i<=$row['count'];$i++){
                echo '<li data-target="#carouselExampleIndicators" data-slide-to='.$i.'></li>';
              }
          ?>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('images/home_slider/default.jpg')">
           <div class="carousel-caption d-none d-md-block">
             <h3  style="color:#000000;">We are Designers</h3>
             <p  style="color:#000000;">We are the best</p>
           </div>
         </div>
          <?php
            $sql="SELECT * from home_slider_images";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                 echo '
                 <div class="carousel-item" style="background-image: url('.$row['img_path'].')">
                  <div class="carousel-caption d-none d-md-block">
                    <h3 style="color:#000000;">'.$row['img_name'].'</h3>
                    <p style="color:#000000;">'.$row['img_desc'].'</p>
                  </div>
                </div>';
              }
            }
          ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">
      <h1 class="my-4">Why Choose Us</h1>

      <div class="row">
        <?php
          $sql="SELECT * from why_choose_us";
          $result = mysqli_query($conn, $sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              echo '
              <div class="col-lg-4 mb-4">
                <div class="card h-100">
                  <h4 class="card-header">'.$row['title'].'</h4>
                  <div class="card-body">
                    <p class="card-text">
                      '.$row['para'].'
                    </p>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary">Learn More</a>
                  </div>
                </div>
              </div>';
            }
          }
        ?>


      </div>
      <!-- /.row -->

      <!-- Portfolio Section -->
      <h2>Our Projects</h2>

      <div class="row">

        <?php
          $sql="SELECT * from our_projects";
          $result = mysqli_query($conn, $sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              echo '
              <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                  <a href="#"><img style="width:100%;height:260px;"class="card-img-top" src="'.$row['img_path'].'" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="#">'.$row['title'].'</a>
                    </h4>
                    <p class="card-text">
                        '.$row['des'].'
                    </p>
                  </div>
                </div>
              </div>
              ';
            }
          }
        ?>
      </div>
      <!-- /.row -->

      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>WAD Features</h2>
          <p>The Website and apps by WAD includes :</p>
          <ul>
            <li>
              <strong>Bootstrap v4</strong>
            </li>
            <li>jQuery</li>
            <li>Font Awesome</li>
            <li>Working contact form with validation</li>
            <li>And many more</li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="images/other/tech1.png" alt="">
        </div>
      </div>
      <!-- /.row -->
      <hr/>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="http://localhost/wearedesigners/contact.php">Call to Action</a>
        </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
      include "include/footer.php";
    ?>

  </body>

</html>
