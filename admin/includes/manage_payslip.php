<table class="table table-striped table-inverse table-responsive" id="table">
    <thead class="thead-inverse">
        <tr>
            <th>Sno.</th>
            <th>Employee Name</th>
            <th>Summary</th>
            <th>Year</th>
            <th>Month</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        </thead>
        <tfoot class="thead">
        <tr>
             <th>Sno.</th>
            <th>Employee Name</th>
            <th>Summary</th>
            <th>Year</th>
            <th>Month</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        </tfoot>
        <tbody>
            <tr>
<?php
    global $connection;
    $query = "SELECT * FROM payslip";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $employee = $row['employee'];
        $total_allow = $row['total_allow'];
        $total_deduct = $row['total_deduct'];
        $basic = $row['basic'];
        $net_salary = $row['net_salary'];
        $year = $row['year'];
        $month = $row['month'];
        $status = $row['status'];

       ?><th><?php echo $id ;?></th>
        <th><?php echo $employee;?></th>
        <th><?php echo "Basic:" ." GH¢ ".$basic. ".00";?><br><?php echo "Total Allowance:" ." GH¢ ".$total_allow. ".00";?><br><?php echo "Total Deduction:" ." GH¢ ".$total_deduct. ".00";?><br><br><?php echo "Net Salary:" ." GH¢ ".$net_salary. ".00";?></th>
        <th><?php echo $year ;?></th>
        <th><?php echo $month ;?></th>
        <th><?php echo $status ;?></th>
        <th><?php echo "<a href='../payslip.php?payslip_id={$id}'><button type='button' class='btn btn-success'><i class='fa fa-tags fa-fw'></i>View Slip</button></a>";?>
        <?php echo "<a onClick=\"javascript: return confirm('Do you wish to delete it.') \" href='payslip_cat.php?delete={$id}'><button type='button' class='btn btn-danger'>Delete</button></a>";?>
        </th>
        </tr><?php
    } 
?>     
        </tbody>
</table><link rel="stylesheet" href="../">

<?php
    
if(isset($_GET['delete'])){
  $delete = $_GET['delete'];
    global $connection;
    
    $query = "DELETE FROM payslip WHERE id = {$delete}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    
    redirect("../pages/payslip_cat.php");
    

}



?>
