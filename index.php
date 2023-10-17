<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="assert/style.css">
     <!--Bootstrap files-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
    
    <div class="row">
        <div class="col-md-4 m-auto " id="home_page">
           <h3 class="text-center">Choose Login Type</h3><br>
           <div class="d-flex justify-content-around">
           <a href="user_login.php"  class="btn btn-success" style="margin-right:20px;">User Login</a>
           <a href="register.php" class="btn btn-warning" style="margin-right:20px;">User Registration</a>
           <a href="admin/admin_login.php" class="btn btn-info">Admin Login</a>
        </div>
        </div>
    </div>
</body>
</html>