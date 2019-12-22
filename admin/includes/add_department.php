<?php
if(isset($_POST['submit'])){

    $department = $_POST['department'];
  

//    
    global $connection;
    if(empty($department)){
        $msg = "<div class='alert alert-danger'><strong>Field cannot be empty</strong></div>";
    } else{
        
    $query = "INSERT INTO department(dep_name) VALUES ('{$department}')";
    
    $result = mysqli_query($connection,$query);
    
    confirmQuery($result);
    if($result){
        
    $msg = "<div class='alert alert-success'><strong>Successfully</strong> Added.</div>";
    }
    } 

    
    

}

if(isset($_POST['deg'])){

    $designation = $_POST['designation'];
  

//    
    global $connection;
    if(empty($designation)){
        $msg2 = "<div class='alert alert-danger'><strong>Field cannot be empty</strong></div>";
    }else{

    $query = "INSERT INTO designation(designation) VALUES ('{$designation}')";
    
    $result = mysqli_query($connection,$query);
    
    confirmQuery($result);
    if($result){
        
    $msg2 = "<div class='alert alert-success'><strong>Successfully</strong> Added.</div>";
    }
    }  

    
    

}
?>
  

  
  <div class="col-md-6">
   <?php echo isset($msg) ? $msg: '' ;?>
   <div class="row">
        <form action="" method="post">
        <div class="form-group">
           <label for="department">Department:</label>
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-education" required></i></span>
                <input type="text" class="form-control" name="department">
            </div>
        </div>
        <!-- /col-md-6 left float -->
        <input type="submit" name="submit" class="btn btn-primary" value="Department" >
        </form>
   </div>
    <!--/row -->
</div>
<!-- /col-lg-6 -->
  <div class="col-md-6">
   <?php echo isset($msg2) ? $msg2: '' ;?>
   <div class="row">
        <form action="" method="post">
        <div class="form-group">
           <label for="designation">Designation:</label>
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-knight"></i></span>
                <input type="text" class="form-control" name="designation">
            </div>
        </div>
        <!-- /col-md-6 left float -->
        <input type="submit" name="deg" class="btn btn-primary" value="Designation" >
        </form>
   </div>
    <!--/row -->
</div>