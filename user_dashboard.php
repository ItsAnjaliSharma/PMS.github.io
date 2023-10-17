<?php 
session_start();
if(isset($_SESSION['email'])){
include("includes/connect.php");
if(!empty($_SESSION["uid"])){
    $uid=$_SESSION["uid"];
    $result=mysqli_query($con,"SELECT * FROM users WHERE uid =$uid");
    $row=mysqli_fetch_assoc($result);
}
else{
    header("Location : user_login.php");
}
?>

<?php
if(isset($_POST['submit_leave'])){
    $query="INSERT INTO leaves VALUE (null,$_SESSION[uid],'$_POST[subject]','$_POST[message]','No Action')";
    $query_run=mysqli_query($con,$query);
    if($query_run){
        echo "<script>
        alert('Form submitted successfully...');
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
    <title>User Dashboard</title>
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="assert/style.css">
     <!--Bootstrap files-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script  >
    $(document).ready(function(){
        $("#update_task").click(function(){
       $("#right_sidebar").load("task.php");
        });
    });

    $(document).ready(function(){
        $("#apply_leave").click(function(){
       $("#right_sidebar").load("leaveForm.php");
        });
    });

    $(document).ready(function(){
        $("#leave_status").click(function(){
       $("#right_sidebar").load("leave_status.php");
        });
    });
   
    </script>

</head>
<body>
   <!--header code start here--> 
   <div class="row" id="header">
    <div class="col-md-12" style=" background-color: #9EB384">
        <div class="col-md-4" style=" display:inline-block; ">
            <h4 ><b>Project Management System</b></h4>
        </div>
        <div class="col-md-6" style=" display: inline-block; text-align:right;  ">
            <b>Email:</b>  <?php echo $_SESSION['email']; ?>
            <span style="margin-left:35px;"><b>Name: </b> <?php echo $_SESSION['name']; ?></span>
        </div>
    </div>
   </div>

     <!--header code ends here--> 
  
     <div class="col-md-2 " id="left_sidebar" style=" display:inline-block; justify-content:center; margin-top:50px;">
        <table class="table">
            <tr>
                <td style="text-align:center;">
                    <a href="user_dashboard.php" type="button" id="logout_link">Dashboard</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center; text-decoration:none;">
                    <a type="button" class="link" id="update_task">Update Task</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center; text-decoration:none;">
                    <a id="apply_leave" type="button" class="link" >Apply Leave</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center; text-decoration:none;">
                    <a id="leave_status" type="button" class="link" >Leave Status</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <a href="log_out.php" type="button" id="logout_link">Log Out</a>
                </td>
            </tr>
        </table>
        
     </div>
     <div class="col-md-10" id="right_sidebar" style=" display: inline-block; justify-content:right; margin-top:50px;">
        <h4>Instruction for Employee</h4>
        <ul style="line-height:3rem; font-size :1.24em; list-style-type: none;">
            <li>1.All the employee should mark their attendance daily.</li>
            <li>2.Everyone must complete the task assigned to them.</li>
            <li>3.Kindly maintain decorum of the office.</li>
            <li>4.Keep office and your area neat and clean.</li>
        </ul>

     </div>
</body>
</html>
<?php
}
else{
    header('Location:user_login.php');
}
?>