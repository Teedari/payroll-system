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


<?php
if(isset($_POST['update'])){
    
    $ename = $_POST['ename'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contact_1 = $_POST['contact_1'];
    $contact_2 =  $_POST['contact_2'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $doj = $_POST['doj'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $bSalary = $_POST['bSalary'];
    $allowance = $_POST['allowance'];
    $m_deduction = $_POST['m_deduction'];
    $t_salary = $_POST['t_salary'];
    $acc_HN = $_POST['acc_HN'];
    $acc_number = $_POST['acc_number'];
    $branch = $_POST['branch'];
    $b_name = $_POST['b_name'];
//    
    global $connection;
    
    $query = "UPDATE `employee` SET `emp_name`='{$ename}',`birth_date`= '{$dob}',`gender`= '{$gender}',`contact_1`= {$contact_1},`contact_2`= {$contact_2},`address`= '{$address}',`department`= '{$department}',`date_joined`= '{$doj}',`status`= '{$status}',`email`= '{$email}',`password`= '{$password}',`basic_salary`= {$bSalary},`allowance`={$allowance},`mnthly_deduct`= {$m_deduction},`tot_salary`= {$t_salary},`acc_holder_name`= '{$acc_HN}',`acc_number`= {$acc_number},`bank_name`= '{$b_name}',`bank_branch`= '{$branch}' WHERE employee_id = {$_SESSION['id']}";
    
    $result = mysqli_query($connection,$query);
    
    confirmQuery($result);
    
        if($result){
        
    echo "<div class='alert alert-success'><strong>Successfully</strong> Updated.</div>";
            
    }

//    $error =[
//            'seater' => '',
//            'regno' => ''
//        ];
////        $roomno,$seater,$feespm,$duration,$course,$regno,$fname,$mname,$lname,$gender,$contactno,$email,$econtact,$gurname,$gurrelation,$gurcntno,$caddress,$ccity,$postingDate
//         if(is_seaterEqual($roomno,$seater)){
//            $error['seater'] = 'Seater is not equal!!';
//        }
//         if(is_indexExit()){
//            $error['regno'] = 'Index number already exits!!';
//            
//        }   
//                
//        foreach($error as $key => $value) {
//            if(empty($value)){
//                
//                unset($error[$key]);
//                        }
//        }//foreach 
//        
//        if(empty($error)){
//         registerStudentTable( $roomno,$seater,$feespm,$stayfrom,$duration,$course,$regno,$fname,$mname,$lname,$gender,$contactno,$email,$econtact,$gurname,$gurrelation,$gurcntno,$caddress,$ccity,$postingDate);
//        }
    
    

}
?>
  

  
  <div class="col-lg-12">
   
   <div class="row">
        <form action="" method="post">
           <div class="col-md-6">
            <div>
              <h4>Personal Details</h4><hr>
                    <div>
                     <div class="form-group">
                         <label for="name">Name:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="name" type="text" class="form-control" placeholder="Enter name" name="ename"autocomplete="on" value="<?php echo isset($ename) ? $ename: '' ?>" required>
                          </div>
                     </div>
                     <div class="form-group">
                         <label for="name">Date of Birth:</label>
                          <div class="input-group">
                            <input id="dob" type="date" class="form-control" name="dob" placeholder="" autocomplete="on" value="<?php echo isset($dob) ? $dob: '' ?>" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                          </div>
                     </div>
                     <div class="form-group">
                         <label for="name">Gender:</label>
                          <div class="input-group">
                            <select name="gender" id="" class="form-control" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                          </div>
                     </div>
                     <div class="form-group">
                         <label for="name">Contact:</label>
                          <div class="input-group">
                            <input id="contact" type="text" class="form-control" name="contact_1" placeholder="contact" autocomplete="on" value="<?php echo isset($contact_1) ? $contact_1: '' ?>" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                          </div>
                     </div>
                    <div class="form-group">
                         <label for="name">Contact 2:</label>
                          <div class="input-group">
                            <input id="contact" type="text" class="form-control" name="contact_2" placeholder="contact 2"  required autocomplete="on" value="<?php echo isset($contact_2) ? $contact_2: '' ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                          </div>
                     </div>
                    <div class="form-group">
                         <label for="mStatus">Marital Status:</label>
                          <div class="input-group">
                            <input id="contact" type="text" class="form-control" name="status" placeholder="eg..Married,Single,Divorced" required autocomplete="on" value="<?php echo isset($status) ? $status: '' ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-remove-sign"></i></span>
                          </div>
                     </div>
                     <div class="form-group">
                      <label for="address">Address:</label>
                      <textarea class="form-control" rows="5" id="" name="address"></textarea>
                    </div>
                     </div>
                    <!-- #collapse2 -->

                <h4>Company Details</h4><hr>
                    <div>
<!--
                        <div class="form-group">
                             <label for="employee_id">Employee id:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                                <input id="employee_id" type="text" class="form-control" name="employee_id" placeholder="Auto Generated" disabled>
                              </div>
                         </div>
-->
                         <div class="form-group">
                             <label for="department">Department:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-knight"></i></span>
                                <select id="department" class="form-control" name="department" placeholder="Deparment" required>
                                <option value="">Select Department</option>
                                <?php echo showDepartment(); ?>
                                
                              </select>
                              </div>
                         </div>
                        <div class="form-group">
                             <label for="employee_id">Designation:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                                <select name="designation" id="" class="form-control">
                                    <?php
                                    showDesignation();
                                    ?>
                                </select>
                              </div>
                         </div>
                         <div class="form-group">
                             <label for="doj">Date of Joining:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                <input id="dateofjoin" type="date" class="form-control" name="doj" placeholder="" required>
                              </div>
                         </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-triangle-bottom"></i></span>
                            <select name="status" id="" class="form-control" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <!-- /collapse -->
                    
                                    <!-- /#collapse1 -->
                    
               <h4>Account Login</h4><hr>
                <div>
                         <div class="form-group">
                             <label for="email">Email:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" required value="domain@gmail.com">
                              </div>
                         </div>
                         <div class="form-group">
                             <label for="password">Password:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" value="1234567890">
                              </div>
                         </div>
                         <div class="form-group">
                             <label for="repassword">Repeat Password:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="re_password" type="password" class="form-control" name="password" placeholder="Repeat Password" value="1234567890">
                              </div>
                         </div>
                </div>
                <!-- /#collapse3 -->
                </div>
           </div>
       <!-- /col-md-6 -->
       
               <div class="col-md-6">

                <!-- collapse4 -->
                <h4>Financial Details</h4><hr>
                <div>
                    <div class="form-group">
                        <label for="basic_salary">Basic Salary:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="bSalary" autocomplete="on" value="<?php echo isset($bSalary) ? $bSalary: '' ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="allowance">Allowance:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="allowance" autocomplete="on" value="<?php echo isset($allowance) ? $allowance: '' ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="m_deduction">Monthly Deduction:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                            <input type="text" class="form-control" name="m_deduction" autocomplete="on" value="<?php echo isset($m_deduction) ? $m_deduction: '' ?>">
                        </div>
                    </div>
                <div class="form-group">
                        <label for="t_salary">Total Salary:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                            <input type="text" class="form-control" name="t_salary" autocomplete="on" value="<?php echo isset($t_salary) ? $t_salary: '' ?>">
                        </div>
                </div>

                </div>
                <!-- /collapse4 -->
                
                                    <!-- collapse5 -->
               <h4>Bank Details</h4><hr>
                <div>
                    <div class="form-group">
                        <label for="acc_HN">Account Holder Name:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="acc_HN" required autocomplete="on" value="<?php echo isset($acc_HN) ? $acc_HN: '' ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="acc_number">Account Number:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="acc_number" required autocomplete="on" value="<?php echo isset($acc_number) ? $acc_number: '' ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="b_name">Bank Name:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
                            <input type="text" class="form-control" name="b_name" required autocomplete="on" value="<?php echo isset($b_name) ? $b_name: '' ?>">
                        </div>
                    </div>
                <div class="form-group">
                        <label for="branch">Branch:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
                            <input type="text" class="form-control" name="branch" autocomplete="on" value="<?php echo isset($branch) ? $branch: '' ?>" required>
                        </div>
                </div>

                </div>
                <!-- /collapse5 -->

                </div>
        <!-- /col-md-6 left float -->
                <input type="submit" name="update" class="btn btn-primary" value="Submit" >
        </form>
   </div>
    <!--/row -->
</div>
<!-- /col-lg-12 -->