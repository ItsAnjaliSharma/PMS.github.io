<?php
  session_start();
  
 include('../includes/connect.php');
if(isset($_POST["adminLogin"])){
  $email=$_POST["email"];
  $password=$_POST["password"];
  $query="SELECT * FROM admins WHERE email='$email'";
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result)){
    if($password==$row["password"]){
      $_SESSION["adminLogin"]=true;
      $_SESSION["email"]=$row["email"];
      $_SESSION["name"]=$row["name"];
      header("Location:admin_dashboard.php");
    }
    else{
      echo
      "<script> alert('Wrong  Password');</script>";
    }
  }else{
    echo "<script>alert('User Not Registered');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS | Admin Login</title>
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="../assert/style.css">
     <!--Bootstrap files-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
  <div class="row">
    <div class="col-md-3 m-auto" id="login_page">
    <h3 class="text-center" style="background-color:#AEC3AE; color:#435334; padding:5px;">Admin Login</h3>
        <form action="" method="post" autocomplete="off">
        <div class="form-group m-auto">
        <input type="email" name="email" class="form-control my-2" placeholder="Enter Email" required>
        </div>
        <div class="form-group">   
        <input type="password" name="password" class="form-control my-2" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
        <input type="submit" name="adminLogin" value="Login" class="btn btn-warning l-btn" style="background-color:#435334; color:white;">
        </div><br>
        </form>
        <a href="../index.php" class="btn btn-success" >Go To Home</a>
    </div>
  </div>
</body>
</html>
