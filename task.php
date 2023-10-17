<?php
session_start();
if(isset($_SESSION['email'])){
  include('includes/connect.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="assert/style.css">
     <!--Bootstrap files-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
    <h3 style="text-align:center; justify-content:center;">Task Details</h3>
    <br>
    <table class="table" style="background-color:#E4E4D0; width:75vw; ">
        <tr>
            <th>S.No</th>
            <th>Task Id</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
            $query="SELECT * FROM tasks WHERE uid=$_SESSION[uid]";
            $sno=1;
            $query_run=mysqli_query($con,$query);
            while($row=mysqli_fetch_assoc($query_run)){
              ?> 
              <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $row['tid'];?></td>
                <td><?php echo $row['description']?></td>
                <td><?php echo $row['start_date']?></td>
                <td><?php echo $row['end_date'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><a href="update.php?id=<?php echo $row['tid'];?>">Update</a></td>
              </tr><?php
              $sno=$sno+1;
            }
        ?>
    </table>
</body>
</html>
<?php
}
else{
    header('Location:user_login.php');
}
?>