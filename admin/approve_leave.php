<?php
   session_start();
   if(isset($_SESSION['email'])){
  include('../includes/connect.php');
  $query="UPDATE leaves SET status='Approved' WHERE lid=$_GET[id]";
  $query_run=mysqli_query($con,$query);
  if($query_run){
    echo "<script>
    alert('Leave approved successfully...');
    window.location.href='admin_dashboard.php';
    </script>";
  }
  else{
    echo "<script>
    alert('Please try again...');
    window.location.href='admin_dashbard.php';
    </script>";
  }
}
else{
    header('Location:user_login.php');
}
?>