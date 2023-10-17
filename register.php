<?php
 session_start();
 
 include('includes/connect.php');
 if(isset($_POST['userRegistration'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $mobile=$_POST['mobile'];
     
     $duplicate=mysqli_query($con,"SELECT * FROM users WHERE name='$name' OR email='$email'");
     if(mysqli_num_rows($duplicate)>0){
      echo
      "<script> alert('User or Email has already exist');</script>";
     }
     else{
      if($password>=6){
     
     $query= mysqli_query($con, "Insert into users (name, email, password, mobile) Values ('$name', '$email','$password', '$mobile')");
      
    echo "<script>
    alert('User registered successfully....');
    window.location.href='index.php';
    </script>
    ";
  }
  else{
    echo "<script type='text/javascript'>
    alert('Error...Plz try again.');
    window.location.href='register.php';
    </script>
    "; 
  }
 }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS | Register Page</title>
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="assert/style.css">
     <!--Bootstrap files-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
  <div class="row">
    <div class="col-md-3 m-auto" id="register_page">
    <h3 class="text-center" style="background-color:#AEC3AE; color:#435334; padding:5px;">User Registration</h3>
        <form action="" method="post" autocomplete="off">
        <div class="form-group m-auto">
        <input type="text" name="name" class="form-control my-2" placeholder="Enter Name" required>
        </div>
        <div class="form-group m-auto">
        <input type="email" name="email" class="form-control my-2" placeholder="Enter Email" required>
        </div>
        <div class="form-group">   
        <input type="password" name="password" class="form-control my-2" placeholder="Enter Password" required>
        </div>
        <div class="form-group">   
        <input type="text" name="mobile" class="form-control my-2" placeholder="Enter Mobile Number" required>
        </div>
        
        <div class="form-group">
        <input type="submit" name="userRegistration" value="Register" class="btn btn-warning l-btn" style="background-color:#435334; color:white;">
        </div><br>
        </form>
       
        <a href="index.php" class="btn btn-success " >Home</a>
    </div>
  </div>
</body>
</html>
