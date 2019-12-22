<!-- includes for admin header -->
       <?php include("../includes/admin_header.php");?>
<!-- /includes for admin header -->
       
<!-- navigation includes -->
    <?php include("../includes/admin_navigation.php");?>
    
    <?php include("../includes/admin_sidebar.php");?>
    
 <!-- /navigation includes -->
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Department</h1>
                </div>
                <div class="col-lg-6">
                    <h1 class="page-header">Designation</h1>
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

case 'add_department';
include("../includes/add_department.php");
break;

case 'manage_department';
include("../includes/manage_department.php");
break;

case 'edit_department';
include("../includes/edit_department.php");
break;

case 'view_department';
include("../includes/view_department.php");
break;

default:
include("../includes/manage_department.php");
break;        
}           
?>
            
            <!-- /.row -->
            </div>              
         
<!-- /dashboard -->

 <!-- footer includes -->
    <?php include("../includes/admin_footer.php");?>   
    

