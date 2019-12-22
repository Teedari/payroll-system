<!-- includes for header -->
<?php include("includes/header.php") ?>
<?php

   if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
//    
        global $connection;
    

    $error =[
            'email' => '',
            'password' => ''
        ];

         if(!is_emailFound($email)){
            $error['email'] = 'Email is incorrect';
            
        }
        if(!is_passwordFound($password)){
            $error['password'] = 'password is incorrect';
            
        }
       
        if(!is_emailFound($email) && !is_passwordFound($password)){
            $message = "username and password does not exit";
        }
       
                
        foreach($error as $key => $value) {
            if(empty($value)){
                
                unset($error[$key]);
                        }
        }//foreach 
        
        if(empty($error)){
            login($email,$password);  
        }
   }
?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel login-panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">PAYROLL SYSTEM</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    <p><?php echo isset($error['email']) ? $error['email']: '' ?></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    <p><?php echo isset($error['password']) ? $error['password']: '' ?></p>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" name="login" value="Login"/>
                            </fieldset>
                        </form>
                    </div>
                    <div class="panel-footer">
                          <p class="panel-heading"><?php echo isset($message) ? $message: '' ?></p>
                    </div>
     
                </div>
            </div>
        </div>
    </div>
<!-- includes for footer -->
<?php include("includes/footer.php"); ?>