<?php
  include "db/Database.php";
  $conn=getConn();
  $error="";
?>
<?php
    if(isset($_POST['submit'])){
      if(isset($_POST['name'],$_POST['email'],$_POST['title'],$_POST['comment']) &&
      (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['title']) && !empty($_POST['comment'])))
      {
        $name=mysqli_real_escape_string($conn,htmlentities($_POST['name']));
        $email=mysqli_real_escape_string($conn,htmlentities($_POST['email']));
        $title=mysqli_real_escape_string($conn,htmlentities($_POST['title']));
        $comment=mysqli_real_escape_string($conn,htmlentities($_POST['comment']));
        $sql = "INSERT INTO comments(name,email,title,comment) VALUES ('$name','$email','$title','$comment')";
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $error= "
                <div class='alert alert-danger'>Invalid Email Address
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                   </button>
                </div>
              ";
        }else if(strlen($name)<=3){
          $error= "
              <div class='alert alert-danger'>Please enter valid name
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                 </button>
              </div>
            ";
        }else if(strlen($title)<3){
          $error= "
              <div class='alert alert-danger'>Please enter valid title
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                 </button>
              </div>
            ";
        }else if (mysqli_query($conn, $sql)) {
              $error="
              <div class='alert alert-success'>Comment Subbmited !
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                   </button>
              </div>";
        }
        else{
              $error="<div class='alert alert-danger'>Something went wrong !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
               </button>
              </div>";
        }
        mysqli_close($conn);
        header("Location: comments.php");
      }
      else $error="<div class='alert alert-danger'>Please fill all fields!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
       </button>
      </div>";
    }
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WAD - Comments</title>
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
      <h2 class="mt-4 mb-3">User and Visitors Comments</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Comments</li>
      </ol>

      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
          <?php

            $sql="SELECT * from comments order by date desc";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                 echo '
                 <div class="card mb-4">
                   <div class="card-body">
                     <h2 class="card-title">'.$row['title'].'</h2>
                     <p class="card-text">'.$row['comment'].'</p>
                     <a href="#" class="btn btn-primary">Read More &rarr;</a>
                   </div>
                   <div class="card-footer text-muted">
                     Posted on '.$row['date'].' by
                     <a href="#">'.$row['name'].'</a>
                      ( <a href="mailto:'.$row['email'].'">'.$row['email'].'</a> )
                   </div>
                 </div>
                 ';
              }
            }
          ?>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Comment Here</h5>
            <div class="card-body">
              <?php echo "<h6> $error </h6>"; ?>
              <form action="comments.php" method="post">
                  <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name">
                  </div>
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="text" class="form-control" placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                    <label>Comment title</label>
                    <input type="text" class="form-control" placeholder="title" name="title">
                  </div>
                  <div class="form-group">
                    <label>Your Comment</label>
                    <textarea name="comment" class="form-control" placeholder="Message"></textarea>
                  </div>
                  <input name="submit" type="submit" class="btn btn-default" vlaue="Submit" />
            </form>
            </div>
          </div>
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header" style="color:red">Message</h5>
            <div class="card-body">
              Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
