<?php
session_start();
if(isset($_SESSION['email'])){
  include('../includes/connect.php');
?>
<html>
<html >
    <head>
        <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="../assert/style.css">
    <!--Bootstrap files-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body >
<h3 style="text-align:center; margin-top:20px; ">Assigned Tasks</h3>
<br>
    <table class="table" style="background-color:#E4E4D0; width:75vw;">
      <tr >
        <th>S.No</th>
        <th>Task Id</th>
        <th>Description</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
        <?php
          $sno=1;
          $query="SELECT * FROM tasks";
          $query_run= mysqli_query($con,$query);
          while($row=mysqli_fetch_assoc($query_run)){
              ?>
              <tr>
              <td><?php echo $sno; ?></td>
              <td><?php echo $row['tid']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['start_date']; ?></td>
              <td><?php echo $row['end_date']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td><a href="edit_task.php?id=<?php echo $row['tid'];?>">Edit</a> | <a href="delete_task.php?id=<?php echo $row['tid'];?>">Delete</a></td>
          </tr>
              <?php
              $_sno=$sno+1;         
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