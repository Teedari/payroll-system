<?php
if(isset($_POST['save'])){
    $_SESSION['title_allow'] = $_POST['allow'];
    $_SESSION['amnt_allow'] = $_POST['amnt_allow'];
    $_SESSION['title_allow_2'] = $_POST['allow_2'];
    $_SESSION['amnt_allow_2'] = $_POST['amnt_allow_2'];
    $_SESSION['title_deduct'] = $_POST['mnthly_deduct'];
    $_SESSION['amnt_deduct'] = $_POST['amnt_deduct'];
    $_SESSION['title_deduct_2'] = $_POST['mnthly_deduct_2'];
    $_SESSION['amnt_deduct_2'] = $_POST['amnt_deduct_2'];
    $_SESSION['total_allowance'] = $_POST['amnt_allow'] + $_POST['amnt_allow_2'];
    $_SESSION['total_deduction'] = $_POST['amnt_deduct'] + $_POST['amnt_deduct_2'];
    $_SESSION['net_salary'] = (($_SESSION['total_allowance'] + $_SESSION['basic']) - $_SESSION['total_deduction']);
    $_SESSION['employee_name'] = $_POST['employee_name'];
    redirect("payslip_cat.php?source=final_payslip");
}
?>
<?php
global $connection;
$query = "SELECT * FROM employee WHERE department = '{$_SESSION['dep']}'";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$output = '';
while($row = mysqli_fetch_assoc($result)){
    $employee_name = $row['emp_name'];
    $d_b_salary = $row['basic_salary'];
    $d_allowance = $row['allowance'];
    $d_mnthly_deduct = $row['mnthly_deduct'];
    $output .= "<option value='$employee_name'>$employee_name</option>";  
}
$_SESSION['output'] = $output;
$_SESSION['basic'] = $d_b_salary;
?>
    <!--/row -->
    <div class="row">
        <div class="col-md-6">
           <form action="" method="post">
                <div class="form-group">
                    <label for="allowance">Employee:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        <select name="employee_name" id="" class="form-control">
    <?php echo $_SESSION['output']; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <h4 class="col-md-6">Allowance</h4><h4 class="col-md-6">Other Allowance</h4><hr>
                       <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                 <select id="department" class="form-control" name="allow" placeholder="Deparment" required>
                                    <option value="HRA">HRA</option>
                                    <option value="Accident">Accident</option>
                                    <option value="Food">Food</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="allowance">Allowance:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                <input type="text" class="form-control prc" name="amnt_allow" autocomplete="on" value="<?php echo isset($d_allowance) ? $d_allowance: '' ?>" required>
                            </div>
                        </div>
                    </div>
                    <!-- / -->

                <!-- Other Allowance -->
                <div class="form-group">
                       <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                 <input id="" class="form-control" name="allow_2" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="other_allowance"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                <input type="number" class="form-control prc" name="amnt_allow_2" placeholder="Amount" required>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- /col-md-6 -->

            <!-- DEDUCTION -->
            <div class="col-md-6">
                <div class="form-group">
                    <h4 class="col-md-6">Deduction</h4><h4 class="col-md-6">Other Deduction</h4><hr>
                       <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                 <input id="" class="form-control" name="mnthly_deduct" value ="Monthly Deduction" placeholder="Allowance" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deduction"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                <input type="number" class="form-control" name="amnt_deduct" placeholder="Amount" autocomplete="on" value="<?php echo isset($d_mnthly_deduct) ? $d_mnthly_deduct: '' ?>" required>
                            </div>
                        </div>
                    </div>

                    <!-- Other deduction -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                 <input id="" class="form-control" name="mnthly_deduct_2" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="other_deduction"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                <input type="numbers" class="form-control" name="amnt_deduct_2" placeholder="Amount" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Save" name="save" class=" form-control btn btn-primary">
            </form>
        </div>
    </div>
    <!-- /col-lg-12 -->
