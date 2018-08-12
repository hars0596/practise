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

    <title>WAD - Contact</title>

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
      <h1 class="mt-4 mb-3">Contact Us  </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->
          <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3410.8127136925796!2d75.70148031453313!3d31.253607567394077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x391a5a594d22b88d%3A0x4cc934c58d0992ec!2sLovely+Professional+University%2C+Jalandhar+-+Delhi+G.T.+Road%2C+Phagwara%2C+Punjab+144411!3m2!1d31.253603!2d75.70366899999999!5e0!3m2!1sen!2sin!4v1523304205822">
          </iframe>
        </div>
        <!-- Contact Details Column -->

        <div class="col-lg-4 mb-4">
            <h3>Contact Details</h3>
          <?php
            $sql="SELECT * from contact_details";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                 echo '

                       <p>
                         '.$row['local_addr'].'
                         <br>'.$row['city'].' '.$row['state'].'
                         <br> '.$row['country'].'
                         <br>
                       </p>
                       <p>
                         <span title="Phone">Phone</span>: '.$row['mobile'].'
                       </p>
                       <p>
                         <span title="Email">Email</span>:
                         <a href="mailto:'.$row['email'].'">'.$row['email'].'
                         </a>
                       </p>
                       <p>
                         <span title="Hours">Meeting</span>: '.$row['meeting_time'].'
                       </p>
                       <hr/> <hr/>
                 ';
              }
            }
          ?>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Send us a Message</h3>
          <?php
                if(isset($_POST['submit'])){

                  if(isset($_POST['fullname'],$_POST['phone'],$_POST['email'],$_POST['message']) && (!empty($_POST['fullname'])
                  && !empty($_POST['email'])&& !empty($_POST['phone'])&& !empty($_POST['message'])))
                  {
                      $fullname=mysqli_real_escape_string($conn,htmlentities($_POST['fullname']));
                      $email=mysqli_real_escape_string($conn,htmlentities($_POST['email']));
                      $phone=mysqli_real_escape_string($conn,htmlentities($_POST['phone']));
                      $message=mysqli_real_escape_string($conn,htmlentities($_POST['message']));
                      $sql = "INSERT INTO visitor_messages(fullname,email,phone,msg) VALUES ('$fullname','$email','$phone','$message')";
                      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                          echo "
                              <div class='alert alert-danger'>Invalid Email Address
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                 </button>
                              </div>
                            ";
                      }
                      else if(filter_var($phone, FILTER_VALIDATE_INT) === false || strlen($phone)<6 || strlen($phone)>=12 ) {
                          echo "
                              <div class='alert alert-danger'>Invalid Phone Number
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                 </button>
                              </div>
                            ";
                      }
                      else if (mysqli_query($conn, $sql)) {
                  		      echo "
                            <div class='alert alert-success'>Message Sent!
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                 </button>
                            </div>";
                  		}
                      else{
                            echo "<div class='alert alert-danger'>Something went wrong !
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                             </button>
                            </div>";
                      }
                  		mysqli_close($conn);
                  }
                  else{
                        echo "<div class='alert alert-danger'>Please fill all fields
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                         </button>
                        </div>";
                  }
                }
            ?>
          <form  action="contact.php" method="post" novalidate  >
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" name="fullname" >
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" name="phone">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" name="email" >
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                <textarea rows="10" cols="100" class="form-control" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <input name="submit" type="submit" class="btn btn-primary" value="Send Message"/>
          </form>
        </div>

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
