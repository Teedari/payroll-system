<?php
if(isset($_GET['employee_id'])){
    $the_employee_id = $_GET['employee_id'];
    
    global $connection;
    $query = "SELECT * FROM employee WHERE employee_id = $the_employee_id";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION['id'] = $row['employee_id'];
        $ename = $row['emp_name'];
        $dob = $row['birth_date'];
        $gender = $row['gender'];
        $contact_1 = $row['contact_1'];
        $contact_2 =  $row['contact_2'];
        $address = $row['address'];
        $department = $row['department'];
        $doj = $row['date_joined'];
        $status = $row['status'];
        $email = $row['email'];
        $password = $row['password'];
        $bSalary = $row['basic_salary'];
        $allowance = $row['allowance'];
        $m_deduction = $row['mnthly_deduct'];
        $t_salary = $row['tot_salary'];
        $acc_HN = $row['acc_holder_name'];
        $acc_number = $row['acc_number'];
        $branch = $row['bank_branch'];
        $b_name = $row['bank_name'];

}
}
?>
<div class="col-lg-12">
   
   <div class="row">
           <div class="col-md-6">
            <div>
               <a data-toggle="collapse" href="#collapse1"><h4>Personal Details</h4></a><hr>
                    <div id="collapse1" class="panel-collapse collapse">
                          <table class="table">

    <tbody>
<?php
    global $connection;
    $query = "SELECT * FROM employee WHERE employee_id = {$_SESSION['id']}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $email = $row['email'];
        $address = $row['address'];
        $status = $row['status'];

       ?>
        <tr><th>Employee Name</th><td><?php echo $row['emp_name'];?></td></tr>
        <tr><th>Birth date</th><td><?php echo $row['birth_date'];?></td></tr>
        <tr><th>Gender</th><td><?php echo $row['gender'] ;?></td></tr>
        <tr><th>Contact</th><td><?php echo $row['contact_1'] ;?></td></tr>
        <tr><th>Contact</th><td><?php echo $row['contact_2'] ;?></td></tr>   
        <tr><th>Address</th><td><?php echo $address ;?></td></tr>
        <tr><th>Email</th><td><?php echo $email ;?></td></tr><?php
        }
        
?>
    </tbody>
  </table>
                     </div>
                    <!-- #collapse2 -->

                    <a href="#collapse2" data-toggle="collapse"><h4>Company Details</h4></a><hr>
                    <div id="collapse2" class="panel-collapse collapse">
<table class="table">

    <tbody>
<?php
    global $connection;
    $query = "SELECT * FROM employee WHERE employee_id = {$_SESSION['id']}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $email = $row['email'];
        $address = $row['address'];
        $status = $row['status'];

       ?><tr><th>Employee Id</th><td><?php echo $row['employee_id'] ;?></td></tr>
        <tr><th>Department</th><td><?php echo $row['department'];?></td></tr>
        <tr><th>Designation</th><td><?php echo $row['designation'];?></td></tr>
        <tr><th>Date of joining</th><td><?php echo $row['date_joined'] ;?></td></tr>  
        <tr><th>Status</th><td><?php echo $status ;?></td></tr><?php
        }
        
?>
    </tbody>
  </table>
                </div>
                    <!-- /collapse -->
                    
                                    <!-- /#collapse1 -->
                    
                
                </div>
           </div>
       <!-- /col-md-6 -->
       
               <div class="col-md-6">

                <!-- collapse4 -->
                <a href="#collapse4" data-toggle="collapse"><h4>Financial Details</h4></a><hr>
                <div id="collapse4" class="panel-collapse collapse">
<table class="table">

<tbody>
<?php
global $connection;
$query = "SELECT * FROM employee WHERE employee_id = {$_SESSION['id']}";
$result = mysqli_query($connection,$query);
confirmQuery($result);
while($row = mysqli_fetch_assoc($result)){

?><tr><th>Basic Salary</th><td><?php echo $row['basic_salary'] ;?></td></tr>
<tr><th>Allowance</th><td><?php echo $row['allowance'];?></td></tr>
<tr><th>Monthly Deduction</th><td><?php echo $row['mnthly_deduct'];?></td></tr>
<tr><th>Total</th><td><?php echo ($row['basic_salary']+$row['allowance']) - $row['mnthly_deduct'];?></td></tr><?php
}

?>
</tbody>
</table>

                </div>
                <!-- /collapse4 -->
                
                                    <!-- collapse5 -->
                <a href="#collapse5" data-toggle="collapse"><h4>Bank Details</h4></a><hr>
                <div id="collapse5" class="panel-collapse collapse">
                <table class="table">

<tbody>
<?php
global $connection;
$query = "SELECT * FROM employee WHERE employee_id = {$_SESSION['id']}";
$result = mysqli_query($connection,$query);
confirmQuery($result);
while($row = mysqli_fetch_assoc($result)){

?><tr><th>Account Holder Name</th><td><?php echo $row['acc_holder_name'] ;?></td></tr>
<tr><th>Account Number</th><td><?php echo $row['acc_number'];?></td></tr>
<tr><th>Bank Name</th><td><?php echo $row['bank_name'];?></td></tr>
<tr><th>Bank Branch</th><td><?php echo $row['bank_branch'];?></td></tr><?php
}

?>
</tbody>
</table>

                </div>
                <!-- /collapse5 -->

                </div>
        <!-- /col-md-6 left float -->
   </div>
    <!--/row -->
</div>
<!-- /col-lg-12 -->