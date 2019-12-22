<?php
if(isset($_POST['create'])){
    $pay_method = $_POST['pay_method'];
    $status = $_POST['status'];
    $comments = $_POST['comments'];
    $date = date('d-m-y');
    

//    
    global $connection;
    
    $query = "INSERT INTO `payslip`(`employee`, `department`, `year`, `month`, `allowance`, `allowance_2`, `allow_amnt`, `allow_amnt_2`, `total_allow`, `deduction`, `deduction_2`, `deduct_amnt`, `deduct_amnt_2`, `total_deduct`, `basic`, `net_salary`, `pay_method`, `status`, `comments`, `slip_date`) VALUES ('{$_SESSION['employee_name']}','{$_SESSION['dep']}',{$_SESSION['year']},'{$_SESSION['month']}','{$_SESSION['title_allow']}','{$_SESSION['title_allow_2']}',{$_SESSION['amnt_allow']},{$_SESSION['amnt_allow_2']},{$_SESSION['total_allowance']},'{$_SESSION['title_deduct']}','{$_SESSION['title_deduct_2']}',{$_SESSION['amnt_deduct']},{$_SESSION['amnt_deduct_2']},{$_SESSION['total_deduction']},{$_SESSION['basic']},{$_SESSION['net_salary']},'{$pay_method}','{$status}','{$comments}',now()) ";
    
    $result = mysqli_query($connection,$query);
    
    confirmQuery($result);
    if($result){
        
    echo "<div class='alert alert-success'><strong>Successfully!</strong> Added.</div>";
    }
}
?>
<?php
global $connection;
$query = "SELECT * FROM employee WHERE department = '{$_SESSION['dep']}'";
$result = mysqli_query($connection,$query);
confirmQuery($result);
while($row = mysqli_fetch_assoc($result)){
    $d_b_salary = $row['basic_salary'];
    $d_allowance = $row['allowance'];
    $d_mnthly_deduct = $row['mnthly_deduct'];
}
$d_b_salary;
?>
  
  <div class="col-lg-12">
       <div class="row">

            
    <!--/row -->
    
            <div class="row">
               <div class="col-md-2"></div>
                <div class="col-md-8">
                   <form action="" method="post">
                        <div class="form-group">
                            <h4>Summary</h4>
                                <div class="form-group">
                                        <label for="basic">Basic</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input type="text" name="b_salary" class="form-control" value="<?php echo isset($d_b_salary) ? $d_b_salary: '' ?>" disabled>
                                    </div>
                                </div>
                                 <div class="form-group">
                                        <label for="basic">Total Allowance</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input type="text" name ="t_allowance" class="form-control" value="<?php echo isset($_SESSION['total_allowance']) ? $_SESSION['total_allowance']: '' ?>" disabled>
                                    </div>
                                </div>
                                 <div class="form-group">
                                        <label for="basic">Total Deduction</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input type="text" name="t_deduction" class="form-control" value="<?php echo isset($_SESSION['total_deduction']) ? $_SESSION['total_deduction']: '' ?>" disabled>
                                    </div>
                                </div>
                                 <div class="form-group">
                                        <label for="basic">Net Salary</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <input type="text" name="net_salary" class="form-control" value="<?php echo isset($_SESSION['net_salary']) ? $_SESSION['net_salary']: '' ?>" disabled>
                                    </div>
                                </div>
                                 <div class="form-group">
                                        <label for="basic">Payment Method</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <select name="pay_method" class="form-control" id="" required>
                                            <option value="">Select</option>
                                            <option value="bank">Bank</option>
                                            <option value="cash">Cash</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                        <label for="basic">Status</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                        <select name="status" class="form-control" id="" required>
                                            <option value="">Select</option>
                                            <option value="paid">Paid</option>
                                            <option value="unpaid">UnPaid</option>
                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="comment">Comment:</label>
                                  <textarea class="form-control" rows="5" name="comments" id="comment"></textarea>
                                </div>
                       </div>
                        <input type="submit" value="Create Payslip" name="create" class="form-control btn btn-primary">
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
      </div>
</div>
    <!-- /col-lg-12 -->
