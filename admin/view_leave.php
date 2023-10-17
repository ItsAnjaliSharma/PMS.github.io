<?php
session_start();
if(isset($_SESSION['email'])){
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <h3 style="text-align:center">Leave Applications</h3><br>
<table class="table" style="background-color:#E4E4D0; width:75vw;">
<tr>
    <th>S.No</th>
    <th>User</th>
    <th>Subject</th>
    <th style="width:40%;">Message</th>
    <th>Status</th>
    <th>Action</th>
</tr>
<?php
   $sno=1;
   $query="SELECT * FROM leaves";
    $query_run=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($query_run)){
        ?>
        <tr>
            <td><?php echo $sno; ?></td>
               <?php
               $query1="SELECT name FROM users where uid=$row[uid]";
               $query_run1=mysqli_query($con,$query1);
               while($row1=mysqli_fetch_assoc($query_run1)){
                ?>
             <td><?php echo $row1['name']; ?></td>
             <?php
               }
               ?>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['message'];?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a href="approve_leave.php?id=<?php echo $row['lid']; ?>">Approve</a> | <a href="reject_leave.php?id=<?php echo $row['lid']; ?>">Reject</a></td>
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