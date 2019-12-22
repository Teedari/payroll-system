<?php
if(isset($_POST['submit'])){

    $dep = $_POST['department'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    if(empty($dep) !== '' && empty($year) !== '' && empty($month) !== ''){
        $_SESSION['dep'] = $dep;
        $_SESSION['year'] = $year;
        $_SESSION['month'] = $month;
        redirect("payslip_cat.php?source=create_payslip");
    }
    
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
    
?>
  

  
  <div class="col-lg-12">
   
   <div class="row">
       <div>
            <form action="" method="post">
               <div class="form-inline">
                    <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-education" required></i></span>
                                <select id="department" class="form-control" name="department" placeholder="Deparment" required>
                                   <option value="">Select Department</option>
                                    <?php
                                    echo showDepartment();
                                    ?>
                              </select>
                        </div>
                    </div>
<!--
                    <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <select name="employee" id="employee" class="form-control">
                                <option value="westhills">Select department first</option>
                            </select>
                        </div>
                    </div>
-->
                    <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <select type="text" class="form-control" name="year">
                            
                            <?php echo year(); ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <select type="text" class="form-control" name="month">
                            
                            <?php month(); ?>
                            
                            </select>
                        </div>
                    </div>
                    
                    
                    <!-- /col-md-6 left float -->
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
        <!-- /div -->
        
   </div>
    <!--/row -->
</div>
<!-- /col-lg-12 -->
