<!-- includes for admin header -->
       <?php include("../includes/admin_header.php");?>
<!-- /includes for admin header -->
       
<!-- navigation includes -->
    <?php include("../includes/admin_navigation.php");?>
    
    <?php include("../includes/admin_sidebar.php");?>
    
 <!-- /navigation includes -->
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Payslip <span> <i class="fa fa-money fa-2x"></i></span></h1>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
            <!-- /.row -->
            <div class="row">
 <?php           
            if(isset($_GET['source'])){
$source = $_GET['source'];
}else{
$source = '';
}
switch($source) {

case 'add_payslip';
include("../includes/add_payslip.php");
break;

case 'manage_payslip';
include("../includes/manage_payslip.php");
break;

case 'edit_payslip';
include("../includes/edit_payslip.php");
break;

case 'create_payslip';
include("../includes/create_payslip.php");
break;
    
case 'final_payslip';
include("../includes/final_slip.php");
break;

case 'view_payslip';
include("../payslip.php");
break;

default:
include("../includes/manage_payslip.php");
break;        
}           
?>
            
            <!-- /.row -->
            </div>              
         
<!-- /dashboard -->

 <!-- footer includes -->

    <?php include("../includes/admin_footer.php");?>

