<?php 
session_start();
if(isset($_SESSION['email'])){
 include('includes/connect.php');
 if(isset($_POST['update'])){
    $query="UPDATE tasks SET status='$_POST[status]' WHERE tid=$_GET[id]";
    $query_run=mysqli_query($con,$query);
    if($query_run){
        echo "<script>
    alert('Status updated successfully...');
    window.location.href='user_dashboard.php';
    </script>";
    }
    else{
        echo "<script>
    alert('Please try again...');
    window.location.href='user_dashboard.php';
    </script>";
    }
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS|Update Status</title>
     <!--External CSS file-->
     <link rel="stylesheet" type="text/css" href="assert/style.css">
     <!--Bootstrap files-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
   <!-- header code starts here-->
     <div class="row" id="header">
        <div class="col-md-12" style="display:inline-block; height:10vh; align-item:center; justify-content:center;">
            <h3>Project Management System</h3>

        </div>
     </div>

     <div class="row">
        <div class="col-md-4 m-auto container" style="color:black;"><br>
          <h3 style="color:black; text-align:center; justify-content:center;">Update Status</h3><br> 
          <?php
              
                $query="SELECT * FROM tasks where tid= $_GET[id]";
                $query_run=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($query_run)){

          ?>
          <form action="" method="post">
            <div class="form-group" required>
             <select name="status" class="form-control form-select mx-3 sm-md-lg" style="width:35vw; height:6vh; justify-content:center;  ">
                <option>Select</option>
                <option>In Progress</option>
                <option>Complete</option>
             </select>
                    
                </div>
              <input type="submit" style=" justify-content:center; margin: 16px;" class="btn btn-success form-control-sm-md-lg my-3" name="update" value="Update">
            </form>
            <?php } ?>
        </div>

     </div>
</body>
</html>
<?php
}
else{
    header('Location:user_login.php');
}
?>