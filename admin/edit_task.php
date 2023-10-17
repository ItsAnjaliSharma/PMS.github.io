<?php 
session_start();
if(isset($_SESSION['email'])){
 include('../includes/connect.php');
 if(isset($_POST['edit_task'])){
    $query="UPDATE tasks SET uid=$_POST[id],description='$_POST[description]',start_date='$_POST[start_date]', end_date ='$_POST[end_date]' WHERE tid=$_GET[id]";
    $query_run=mysqli_query($con,$query);
    if($query_run){
        echo "<script>
    alert('Task updated successfully...');
    window.location.href='admin_dashboard.php';
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
    <title>PMS</title>
     <!--External CSS file-->
     <link rel="stylesheet" type="text/css" href="../assert/style.css">
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
          <h3 style="color:black;">Edit Task</h3>
          <?php
              
                $query="SELECT * FROM tasks where tid= $_GET[id]";
                $query_run=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($query_run)){

          ?>
          <form action="" method="post">
            <div class="form-group">
                <input type="hidden" name="id" class="form-control" value="" required>
            </div>

            <div class="form-group" required>
                    <label class="col-sm-2 col-form-label col-form-label-sm-md-lg my-2">Select User</label>
                    <select name="id" class="form-control form-select border" style="width:35vw;" >
                        <option>Select</option>
                        <?php
                            
                            $query1="SELECT uid,name FROM users";
                            $query_run1=mysqli_query($con,$query1);
                            if(mysqli_num_rows($query_run1)){
                                while($row1=mysqli_fetch_assoc($query_run1)){
                                    ?>
                          <option value="<?php echo $row1['uid']; ?>"><?php echo $row1['name'];?></option> <?php    }
                            }
                        ?>
                    </select>
             
                </div>

                <div class="form-group">
                <label class="col-sm-2 col-form-label col-form-label-sm-md-lg my-2"> Description</label>
                <textarea class="form-control  border" rows="3" cols="50" name="description" style="width: 35vw; " required><?php echo $row['description'];?></textarea>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 col-form-label col-form-label-sm-md-lg my-2">Start Date</label><br>
                <input type="date"  class="from-control form-control-sm " name="start_date" placeholder="Select start date" style="width: 35vw;" value="<?php echo $row['start_date'];?>">
              </div>
               
              <div class="form-group">
                <label class="col-sm-2 col-form-label col-form-label-sm-md-lg my-2">End Date</label><br>
                <input type="date"  class="from-control form-control-sm" name="end_date" placeholder="Select end date" style="width: 35vw;" value="<?php echo $row['end_date'];?>">
              </div>
              
              <input type="submit" class="btn btn-success form-control-sm my-3" name="edit_task" value="Update">
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