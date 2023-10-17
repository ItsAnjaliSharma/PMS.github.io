
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task Here</title>
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="../assert/style.css">
     <!--Bootstrap files-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
 
</head>
<body>
    <h2>Create Task<h2>
        
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label class="col-sm-2 col-form-label col-form-label-sm">Select User</label>
                    <select name="id" class="form-control form-select border" >
                        <option>Select</option>
                        <?php
                            include('../includes/connect.php');
                            $query="SELECT uid,name FROM users";
                            $query_run=mysqli_query($con,$query);
                            if(mysqli_num_rows($query_run)){
                                while($row=mysqli_fetch_assoc($query_run)){
                                    ?>
                          <option value="<?php echo $row['uid']; ?>"><?php echo $row['name'];?></option> <?php    }
                            }
                        ?>
                    </select>
             
                </div>
              <div class="form-group">
                <label class="col-sm-2 col-form-label col-form-label-sm"> Description</label>
                <textarea class="form-control  border" rows="3" cols="50" name="description" placeholder="Mention the task"></textarea>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 col-form-label col-form-label-sm">Start Date</label>
                <br><input type="date"  class="from-control form-control-sm " name="start_date" placeholder="Select start date" style="width: 35vw; border:none;">
              </div>
               
              <div class="form-group">
                <label class="col-sm-2 col-form-label col-form-label-sm">End Date</label>
                <br><input type="date"  class="from-control form-control-sm" name="end_date" placeholder="Select end date" style="width: 35vw; border:none; border-">
              </div>
              
              <input type="submit" class="btn btn-success form-control-sm my-3" name="create_task" value="Create">
            </form>
        </div>

</body>
</html>

