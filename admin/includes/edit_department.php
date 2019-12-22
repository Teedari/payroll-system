<?php
if(isset($_GET['department_id'])){
    $the_dep_id = $_GET['department_id'];
    
    $query = "SELECT * FROM department WHERE dep_id = {$the_dep_id}";
    
    $result = mysqli_query($connection,$query);
    
    confirmQuery($result);
    
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['dep_id'];
        $department = $row['dep_name'];
    }
    
    $_SESSION['id'] = $id;
}


?>



<?php
if(isset($_POST['submit'])){

    $department = $_POST['department'];

//    
    global $connection;
    if(empty($department)){
        $msg = "<div class='alert alert-danger'><strong>Field cannot be empty</strong></div>";
    }else{

    $query = "UPDATE department SET dep_name = '{$department}' WHERE dep_id = {$_SESSION['id']}";
    
    $result = mysqli_query($connection,$query);
    
    confirmQuery($result);
    if($result){
        
    $msg ="<div class='alert alert-success'><strong>Successfully</strong> Updated.</div>";
    }
    }
 

}
?>
 
  
<?php
if(isset($_GET['id'])){
    $the_deg_id = $_GET['id'];
    
    $query = "SELECT * FROM designation WHERE deg_id = {$the_deg_id}";
    
    $result = mysqli_query($connection,$query);
    
    confirmQuery($result);
    
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['deg_id'];
        $designation = $row['designation'];
    }
    
    $_SESSION['id2'] = $id;
}


?>



<?php
if(isset($_POST['degUpdate'])){

    $designation = $_POST['designation'];

//    
    global $connection;
    if(empty($designation)){
        $msg2 = "<div class='alert alert-danger'><strong>Field cannot be empty</strong></div>";
    }else{
        
    $query = "UPDATE designation SET designation = '{$designation}' WHERE deg_id = {$_SESSION['id2']}";
    
    $result = mysqli_query($connection,$query);
    
    confirmQuery($result);
    if($result){
        
    $msg2 = "<div class='alert alert-success'><strong>Successfully</strong> Updated.</div>";
    }
    }
 

}
?> 

  
  <div class="col-lg-6">
    <?php echo isset($msg) ? $msg: '' ;?>
   <div class="row">
        <form action="" method="post">
        <div class="form-group">
           <label for="department">Department:</label>
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-education" required></i></span>
                <input type="text" class="form-control" name="department" autocomplete="on" value="<?php echo isset($department) ? $department: '' ?>">
            </div>
        </div>
        <!-- /col-md-6 left float -->
        <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
        </form>
   </div>
    <!--/row -->
</div>
<!-- /col-lg-12 -->


  <div class="col-lg-6">
    <?php echo isset($msg2) ? $msg2: '' ;?>
   <div class="row">
        <form action="" method="post">
        <div class="form-group">
           <label for="designation">Designation:</label>
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-knight"></i></span>
                <input type="text" class="form-control" name="designation" autocomplete="on" value="<?php echo isset($designation) ? $designation: '' ?>">
            </div>
        </div>
        <!-- /col-md-6 left float -->
        <input type="submit" name="degUpdate" class="btn btn-primary" value="Submit" >
        </form>
   </div>
    <!--/row -->
</div>