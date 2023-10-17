
<?php
 session_start();
 if(isset($_SESSION['email'])){
 include('includes/connect.php');
  $_SESSION=[];
  session_unset();
  session_destroy();
  header ('Location:index.php');
 }
 else{
  header('Location:user_login.php');
 }
?>