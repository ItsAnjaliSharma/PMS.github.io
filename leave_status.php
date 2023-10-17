<?php 
session_start();
if(isset($_SESSION['email'])){
include('includes/connect.php');
?>
<html lang="en">
<body>
    <h3 style="text-align:center;">Your Leave Status</h3>
    <br>
    <table class="table" style="background-color:#E4E4D0; width:75vw;">
      <tr>
        <th>S.No</th>
        <th>Subject</th>
        <th style="width:40%;">Message</th>
        <th>Status</th>
      </tr>
      
       <?php
       $sno=1;
        $query="SELECT * FROM leaves WHERE uid=$_SESSION[uid]";
        $query_run=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($query_run)){
       ?>
        <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $row['subject'];?></td>
            <td><?php echo $row['message'];?></td>
            <td><?php echo $row['status'];?></td>
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