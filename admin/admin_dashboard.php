<?php
session_start();
if(isset($_SESSION['email'])){
include('../includes/connect.php');
if(isset($_POST['create_task'])){
    $query="INSERT INTO tasks VALUES (null,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
    $query_run=mysqli_query($con,$query);
  if($query_run){
    echo "<script>
    alert('Task created successfully...');
    window.location.href='admin_login.php';
    </script>";
  }
 else{
    echo "<script>
    alert('Please try again...');
    window.location.href='admin_dashboard.php';
    </script>";
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="../assert/style.css">
     <!--Bootstrap files-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
   <!-- jquery code-->
   <script  >
    $(document).ready(function(){
        $("#create_task").click(function(){
       $("#right_sidebar").load("create_task.php");
        });
    });

    $(document).ready(function(){
        $("#manage_task").click(function(){
       $("#right_sidebar").load("manage_task.php");
        });
    });

    $(document).ready(function(){
        $("#view_leave").click(function(){
       $("#right_sidebar").load("view_leave.php");
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
            <b>Email:</b> <?php echo $_SESSION['email']; ?>
            <span style="margin-left:35px;"><b>Name: </b><?php echo $_SESSION['name']; ?></span>
        </div>
    </div>
   </div>
     <!--header code ends here--> 
   
  
     <div class="col-md-2 " id="left_sidebar" style=" display:inline-block; justify-content:center; margin-top:50px;">
        <table class="table">
            <tr>
                <td style="text-align:center;">
                    <a href="admin_dashboard.php" type="button" id="logout_link">Dashboard</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center; ">
                    <a type="button" class="link text-decoration-none" id="create_task" >Create Task</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <a type="button" class="link text-decoration-none" id="manage_task" > Manage Task</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center; ">
                    <a type="button" class="link text-decoration-none" id="view_leave">Leave Application</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <a href="../log_out.php" type="button" id="logout_link">Log Out</a>
                </td>
            </tr>
        </table>
        
     </div>
     <div class="col-md-10" id="right_sidebar" style=" display: inline-block; justify-content:right; margin-top:50px;">
        <h4>Instruction for Admin</h4>
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