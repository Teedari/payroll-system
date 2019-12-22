<table class="table table-striped table-inverse table-responsive" id="table">
    <thead class="thead-inverse">
        <tr>
            <th>Sno.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot class="thead">
        <tr>
            <th>Sno.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </tfoot>
        <tbody>
            <tr>
<?php
    global $connection;
    $query = "SELECT * FROM employee ORDER BY employee_id DESC";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['employee_id'];
        $ename = $row['emp_name'];
        $email = $row['email'];
        $department = $row['department'];
        $designation = $row['designation'];
        $address = $row['address'];
        $status = $row['status'];

       ?><th><?php echo $id ;?></th>
        <th><?php echo $ename;?></th>
        <th><?php echo $email ;?></th>
        <th><?php echo $department ;?></th>
        <th><?php echo $designation ;?></th>
        <th><?php echo $address ;?></th>
        <th><?php echo $status ;?></th>
        <th><?php echo "<a href='employee_cat.php?source=view_employee&employee_id={$id}'><button type='button' class='btn btn-success'>View</button></a>";?>
        <?php echo "<a href='employee_cat.php?source=edit_employee&employee_id={$id}'><button type='button' class='btn btn-primary'>Edit</button></a>";?>
        <?php echo "<a onClick=\"javascript: return confirm('Do you wish to delete it.') \" href='employee_cat.php?delete={$id}'><button type='button' class='btn btn-danger'>Delete</button></a>";?>
        </th>
        </tr><?php
    } 
?>      
        </tbody>
</table>

<?php
    
if(isset($_GET['delete'])){
  $delete = $_GET['delete'];
    global $connection;
    
    $query = "DELETE FROM employee WHERE employee_id = {$delete}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    
    redirect("../pages/employee_cat.php");
    

}



?>
