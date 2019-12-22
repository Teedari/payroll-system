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
                    <h1 class="page-header">Employee</h1>
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

case 'add_employee';
include("../includes/add_employee.php");
break;

case 'manage_employee';
include("../includes/manage_employee.php");
break;

case 'edit_employee';
include("../includes/edit_employee.php");
break;

case 'view_employee';
include("../includes/view_employee.php");
break;

default:
include("../includes/manage_employee.php");
break;        
}           
?>
            
            <!-- /.row -->
            </div>              
         
<!-- /dashboard -->

 <!-- footer includes -->
    <?php include("../includes/admin_footer.php");?>   
    

