<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create User Registration and Login using PHP Oops Concepts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<?php

include_once "students.php";

$studentObj = new Students();

$success = "";
$error = "";

if (isset($_POST['submit'])) {
	$newdata['name'] = $_POST['name'];
	$newdata['email'] = $_POST['email'];
	$newdata['password'] = md5($_POST['password']);
	$newdata['phone'] = $_POST['phone'];
	$newdata['registration_date'] = date('Y-m-d');

	if (!$studentObj->isUserPhoneNumberExists($newdata['phone'])) {
	    if (!$studentObj->isUserExist($newdata['email'])) {
	       if ($studentObj->registration($newdata)) {
                 $success = "Your Registration Successfully Please login";
	       } else {
		  $error = "Registration failed please try again!";
	      }
	    } else {
	        $error = "Email already exists! Please try again.";
	    }
	} else {
	    $error = "Phone No. already exists! Please try again.";
	}
}

?>

<body class="hold-transition register-page">
   <div class="register-box">
      <div class="register-logo">
         <a href=""><b>Student</b></a>
      </div>
      <?php
         if (!empty($error)) {
         	echo "<div class='alert alert-danger alert-dismissible'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>$error
                  </div>";
         } elseif (!empty($success)) {
         	echo "<div class='alert alert-success alert-dismissible'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>$success
                  </div>";
         }
      ?>
      <div class="card">
         <div class="card-body register-card-body">
            <p class="login-box-msg">Registering a new Student</p>
            <form action="" method="post">
               <div class="input-group mb-3">
                  <input type="text" name="name" class="form-control" placeholder="Full name" required="">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fa fa-user"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="email" name="email" class="form-control" placeholder="Email" required="">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fa fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password" required="">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fa fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="text" name="phone" class="form-control" placeholder="Phone Number" required="" maxlength="10">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fa fa-phone"></span>
                     </div>
                  </div>
               </div>
                  <div class="col-md-4">
                     <input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign Up">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
 </body>
</html>