<?php
if(isset($_POST['submit'])){

    $year = $_POST['year'];
    $month = $_POST['month'];

    if(empty($year) !== '' && empty($month) !== ''){
        $_SESSION['year'] = $year;
        $_SESSION['month'] = $month;
        redirect("payslip_cat.php?source=manage_payslip");
    }
    
    }

    
?>
  

  
  <div class="col-lg-12">
   
   <div class="row">
       <div>
            <form action="" method="post">
               <div class="form-inline">
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
