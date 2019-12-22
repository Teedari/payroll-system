<!-- includes for admin header -->
       <?php include("../includes/admin_header.php");?>
<!-- /includes for admin header -->
       
<!-- navigation includes -->
    <?php include("../includes/admin_navigation.php");?>
    
    <?php include("../includes/user_sidebar.php");?>
 <!-- /navigation includes -->

<?php
$query = "SELECT * FROM users WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($connection,$query);
confirmQuery($result);
while($row = mysqli_fetch_assoc($result)){
    $admin_id = $row['id'];
    $username = $row['username'];
}

?>
<?php
    if(isset($_POST['save_pass'])){
        $email = $_POST['email'];
        $oldpassword = trim($_POST['oldpassword']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);
        $error =[
            'password' => '',
            'oldpassword' => '',
            'password2' => ''
            
        ];
        

        if(empty($password)){
            $error['password'] = 'Field is empty';
        }
    
        if(empty($password2)){
            $error['password2'] = 'Field is empty';
        }
        
        if(!validOldPass($oldpassword,$admin_id)){
           $error['oldpassword'] = 'old password incorrect'; 
        }
        
        if(strlen($password) < 8){
            $error['password'] = 'password cannot be less than 10';
        }
        
        if(strlen($password2) < 8){
            $error['password2'] = 'password cannot be less than 10';
        }
        
        if($password !== $password2){
            $error['password2'] = 'password does not match';
        }
        
        foreach($error as $key => $value) {
            if(empty($value)){
                
                unset($error[$key]);
                        }
        }//foreach 
        
        if(empty($error)){
        ValidPassword($email,$password2,$admin_id);
        echo"<script>alert('Password Successfully Updated');</script>";
        }
        
    }
?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Admin</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" role="form" class="form">
                    <div class="form-group">
                      <label for="email" class="form-control-label">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="username@test.com"
                      autocomplete="on" 
                    value="<?php echo $_SESSION['username']?>">
                    </div>
                        <div class="form-group">
                            <label for="oldpassword">Old Password</label>
                            <input type="password" name="oldpassword" class="form-control" required>
                            <p><?php echo isset($error['oldpassword']) ? $error['oldpassword']: '' ?></p>
                        </div>
                        <div class="form-group">
                            <label for="newpassword">New Password</label>
                            <input type="password" name="password" class="form-control" required>
                          <p><?php echo isset($error['password']) ? $error['password']: '' ?></p>
                        </div>
                        <div class="form-group">
                            <label for="password2">Confirm Password</label>
                            <input type="password" name="password2" class="form-control" required>
                            <p><?php echo isset($error['password2']) ? $error['password2']: '' ?></p>
                        </div>
                        <button type="submit" name="save_pass" class="btn btn-success btn-block md-3">Save</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
            </div>              
         
<!-- /dashboard -->

 <!-- footer includes -->
    <?php include("../includes/admin_footer.php");?>   
    

