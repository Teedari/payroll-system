<!-- includes for admin header -->
       <?php include("../includes/admin_header.php");?>
<!-- /includes for admin header -->
       
<!-- navigation includes -->
    <?php include("../includes/admin_navigation.php");?>
    
    <?php include("../includes/user_sidebar.php");?>
 <!-- /navigation includes -->
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                    <p class="h3">Welcome to  <span style="font-weight:bold"><?php echo $_SESSION['user_role'];?></span> Panel</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
global $connection;
$query = "SELECT * FROM payslip WHERE employee = '{$_SESSION['Uemployee']}'";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
   echo $row;                    
?>
                                    </div>
                                    <div>Payslips Released</div>
                                </div>
                            </div>
                        </div>
                        <a href="payslip_cat.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


 
    <?php include("../includes/admin_footer.php");?>   
    

