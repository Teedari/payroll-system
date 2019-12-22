<?php
if(isset($_POST['submit'])){
    $emp_id = $_POST['emp_id'];
    $ename = $_POST['ename'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contact_1 = $_POST['contact_1'];
    $contact_2 =  $_POST['contact_2'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $doj = $_POST['doj'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $bSalary = $_POST['bSalary'];
    $allowance = 25;
    $m_deduction =  10;
    $t_salary = ($allowance+$bSalary) - $m_deduction;
    $acc_HN = $_POST['acc_HN'];
    $acc_number = $_POST['acc_number'];
    $branch = $_POST['branch'];
    $b_name = $_POST['b_name'];
    $re_password = $_POST['re_password'];
//    


    $error =[
            'email' => '',
            'password' => ''
        ];
       
         if(is_emailEmployee($email)){
            $error['email'] = 'Email already exit!!';
        }
         if(!passwordMatch($re_password,$password)){
            $error['password'] = 'Password doesn\'t match!!';
            
        }   
                
        foreach($error as $key => $value) {
            if(empty($value)){
                
                unset($error[$key]);
                        }
        }//foreach 
        
        if(empty($error)){
        addEmployee($emp_id,$ename,$dob,$gender,$contact_1,$contact_2,$address,$department,$designation,$doj,$status,$email,$password,$bSalary,$allowance,$m_deduction,$t_salary,$acc_HN,$acc_number,$b_name,$branch);
        }
}
?>
  

  
  <div class="col-lg-12">
  <div class="alert alert-info">
   <p><strong><?php echo isset($error['email']) ? $error['email']: '' ?></strong><strong><?php echo isset($error['password']) ? $error['password']: '' ?></strong></p>
</div>
   <div class="row">
        <form action="" method="post">
           <div class="col-md-6">
            <div>
               <a data-toggle="collapse" href="#collapse1"><h4>Personal Details</h4></a><hr>
                    <div id="collapse1" class="panel-collapse collapse">
                     <div class="form-group">
                         <label for="name">Employee id:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="number" class="form-control" placeholder="Enter name" name="emp_id" value="<?php echo generateKey($connection);?>" readonly>
                          </div>
                     </div>
                     <div class="form-group">
                         <label for="name">Name:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="name" type="text" class="form-control" placeholder="Enter name" name="ename" required>
                          </div>
                     </div>
                     <div class="form-group">
                         <label for="name">Date of Birth:</label>
                          <div class="input-group">
                            <input id="dob" type="date" class="form-control" name="dob" placeholder="" required>
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
                            <input id="contact" type="number" class="form-control" name="contact_1" placeholder="contact" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                          </div>
                     </div>
                    <div class="form-group">
                         <label for="name">Contact 2:</label>
                          <div class="input-group">
                            <input id="contact" type="number" class="form-control" name="contact_2" placeholder="contact 2"  required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                          </div>
                     </div>
                    <div class="form-group">
                         <label for="mStatus">Marital Status:</label>
                          <div class="input-group">
                            <select class="form-control" name="status" placeholder="eg..Married,Single,Divorced" required>
                            <option value="married">Married</option>
                            <option value="single">Single</option>
                            <option value="divorced">Divorced</option>
                            
                              </select>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-remove-sign"></i></span>
                          </div>
                     </div>
                     <div class="form-group">
                      <label for="address">Address:</label>
                      <textarea class="form-control" rows="5" id="" name="address"></textarea>
                    </div>
                     </div>
                    <!-- #collapse2 -->

                    <a href="#collapse2" data-toggle="collapse"><h4>Company Details</h4></a><hr>
                    <div id="collapse2" class="panel-collapse collapse">
                         <div class="form-group">
                             <label for="department">Department:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-knight"></i></span>
                                <select id="department" class="form-control" name="department" placeholder="Deparment" required>
                                    <?php
                                    showDepartment();
                                    ?>
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
                             <label for="doj">Date of Assumption:</label>
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
                                <option value="Inactive"> Inactive</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <!-- /collapse -->
                    
                                    <!-- /#collapse1 -->
                    
                <a href="#collapse3" data-toggle=collapse><h4>Account Login</h4></a><hr>
                <div id="collapse3" class="panel-collapse collapse">
                         <div class="form-group">
                             <label for="email">Email:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
                              </div>
                         </div>
                         <div class="form-group">
                             <label for="password">Password:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                              </div>
                         </div>
                         <div class="form-group">
                             <label for="repassword">Repeat Password:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="re_password" type="password" class="form-control" name="re_password" placeholder="Repeat Password" value="1234567890">
                              </div>
                         </div>
                </div>
                <!-- /#collapse3 -->
                </div>
           </div>
       <!-- /col-md-6 -->
       
               <div class="col-md-6">

                <!-- collapse4 -->
                <a href="#collapse4" data-toggle="collapse"><h4>Financial Details</h4></a><hr>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="form-group">
                        <label for="basic_salary">Basic Salary:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="bSalary">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        </div>
                    </div>
                </div>
                <!-- /collapse4 -->
                
                                    <!-- collapse5 -->
                <a href="#collapse5" data-toggle="collapse"><h4>Bank Details</h4></a><hr>
                <div id="collapse5" class="panel-collapse collapse">
                    <div class="form-group">
                        <label for="acc_HN">Account Holder Name:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="acc_HN" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="acc_number">Account Number:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="acc_number" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="b_name">Bank Name:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
                            <input type="text" class="form-control" name="b_name" required value="Bank Of Ghana">
                        </div>
                    </div>
                <div class="form-group">
                        <label for="branch">Branch:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
                            <input type="text" class="form-control" name="branch" value="Accra" required>
                        </div>
                </div>

                </div>
                <!-- /collapse5 -->

                </div>
        <!-- /col-md-6 left float -->
                <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
        </form>
   </div>
    <!--/row -->
</div>
<!-- /col-lg-12 -->