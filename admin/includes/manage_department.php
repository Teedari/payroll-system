<div class="col-md-6">
    <table class="table table-striped table-inverse table-responsive" id="table">
    <thead class="thead-inverse">
        <tr>
            <th>Sno.</th>

            <th>Department</th>

            <th>Action</th>
        </tr>
        </thead>
        <tfoot class="thead">
        <tr>
            <th>Sno.</th>

            <th>Department</th>

            <th>Action</th>
        </tr>
        </tfoot>
        <tbody>
            <tr>
<?php
    global $connection;
    $query = "SELECT * FROM department";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['dep_id'];
        $department = $row['dep_name'];

       ?><th><?php echo $id ;?></th>

        <th><?php echo $department ;?></th>

        <th><?php echo "<a href='department_cat.php?source=edit_department&department_id={$id}'><button type='button' class='btn btn-primary'>Edit</button></a>";?>
        
        <?php echo "<a onClick=\"javascript: return confirm('Do you wish to delete it.') \" href='department_cat.php?delete={$id}'><button type='button' class='btn btn-danger'>Delete</button></a>";?>
        
        </th>
        </tr><?php
    } 
?>
         
        </tbody>
</table>
</div>

<div class="col-md-6">
    <table class="table table-striped table-inverse table-responsive" id="table">
    <thead class="thead-inverse">
        <tr>
            <th>Sno.</th>
            
            <th>Designation</th>

            <th>Action</th>
        </tr>
        </thead>
        <tfoot class="thead">
        <tr>
            <th>Sno.</th>
            
            <th>Designation</th>

            <th>Action</th>
        </tr>
        </tfoot>
        <tbody>
            <tr>
<?php
    global $connection;
    $query = "SELECT * FROM designation";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $id2 = $row['deg_id'];
        $designation = $row['designation'];
  

       ?><th><?php echo $id2 ;?></th>
        
        <th><?php echo $designation ;?></th>

        <th><?php echo "<a href='department_cat.php?source=edit_department&id={$id2}'><button type='button' class='btn btn-primary'>Edit</button></a>";?>
        
        <?php echo "<a onClick=\"javascript: return confirm('Do you wish to delete it.') \" href='department_cat.php?delete2={$id2}'><button type='button' class='btn btn-danger'>Delete</button></a>";?>
        
        </th>
        </tr><?php
    } 
?>
         
        </tbody>
</table>
</div>

<?php
if(isset($_GET['delete'])){
    $delete = $_GET['delete'];
    
    global $connection;
    
    $query = "DELETE FROM department WHERE dep_id = {$delete}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    
    redirect("../pages/department_cat.php");
}

if(isset($_GET['delete2'])){
    $delete = $_GET['delete2'];
    
    global $connection;
    
    $query = "DELETE FROM designation WHERE deg_id = {$delete}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    
    redirect("../pages/department_cat.php");
}

?>
