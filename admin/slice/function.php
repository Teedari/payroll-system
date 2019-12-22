<?php ob_start();?>
<?php session_start();?>
<?php

// ConfirmQUery Function
function confirmQuery($result){
    global $connection;
    if(!$result){
    die("QUERY FAILED" . mysqli_error($connection));
}
}
// keygen generate

function checkKeys($connection,$randStr){
    global $connection;
    $query = "SELECT * FROM employee";
    $myQuery = mysqli_query($connection,$query);
     if(!$myQuery){
            echo"QUERY FAILED" . mysqli_error($connection);
        }else{
    while($row = mysqli_fetch_assoc($myQuery)){
        $keygen =$row['employee_id'];
        if($keygen == $randStr){
            $keyExits = true;
            break;
        }else{
            $keyExits = false;
        }
    }
     }
    return $keyExits;
}
function generateKey($connection){
    $keyLength = 8;
    $str = "1234567890";
    $randStr = substr(str_shuffle($str),0,$keyLength);
    
    $checkKey = checkKeys($connection,$randStr);
    while($checkKey == true){
        $randStr = substr(str_shuffle($str),0,$keyLength);
          $checkKey = checkKeys($connection,$randStr);
    }
    return $randStr;

}

// Call designation

function showDesignation(){
    global $connection;
    $query = "SELECT * FROM designation";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
        $designation = $row['designation'];
        echo"<option value='$designation'>$designation</option>";
    }
}
// call Department
function showDepartment(){
    global $connection;
    $query = "SELECT * FROM department";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
        $department = $row['dep_name'];
        echo"<option value='$department'>$department</option>";
    }
}

// call Employee
function showAllEmplyee(){
}

// calculate Month
function year(){
    global $connection;
    
    $nowDate = 2020;
    while($nowDate >= 2000){
        $nowDate = $nowDate - 1;
    echo"<option value='$nowDate'>$nowDate</option>";
    }
}

// call month 

function month(){
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$mlength = count($months);
for($x = 0; $x < $mlength; $x++) {
    $mm = $months[$x];
    echo"<option value='$mm'>$mm</option>";
}
}
function redirect($location){
        header("Location: " . $location);
}

//add employee

function addEmployee($emp_id,$ename,$dob,$gender,$contact_1,$contact_2,$address,$department,$designation,$doj,$status,$email,$password,$bSalary,$allowance,$m_deduction,$t_salary,$acc_HN,$acc_number,$b_name,$branch){
        global $connection;
    
    $query = "INSERT INTO `employee`(`employee_id`,`emp_name`, `birth_date`, `gender`, `contact_1`, `contact_2`, `address`, `department`, `designation`, `date_joined`, `status`, `email`, `password`, `basic_salary`, `allowance`, `mnthly_deduct`, `tot_salary`, `acc_holder_name`, `acc_number`, `bank_name`, `bank_branch`) VALUES ($emp_id,'{$ename}','{$dob}','{$gender}',{$contact_1},{$contact_2},'{$address}','{$department}','{$designation}','{$doj}','{$status}','{$email}','{$password}',{$bSalary},{$allowance},{$m_deduction},{$t_salary},'{$acc_HN}',{$acc_number},'{$b_name}','{$branch}')";
    
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    
    $query2 = "INSERT INTO users(username,password,employee,user_role) VALUES ('{$email}','{$password}','{$ename}','user')";
    
    $result2 = mysqli_query($connection,$query2);
    
    confirmQuery($result2);
    if($result){
    echo "<div class='alert alert-success'><strong>Successfully!</strong> Added.</div>";
    }
}


function is_emailEmployee($email){
    global $connection;
    $query = "SELECT email FROM employee WHERE email = '{$email}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}

function passwordMatch($re_password,$password){
    if($re_password == $password){
        return true;
    }else{
        return false;
    }
}








/*-- LOgin Functions */
function is_emailFound($email){
    global $connection;
    $query = "SELECT username FROM users WHERE username = '{$email}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}

function is_passwordFound($password){
    global $connection;
    $query = "SELECT password FROM users WHERE password = '{$password}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($row = mysqli_num_rows($result)>0){
        
        return true;
    }else{

        return false;
    }
}

function is_userRole($email){
    global $connection;
    $query = "SELECT * FROM users WHERE username = '{$email}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $user_role = $row['user_role'];
        $password = $row['password'];
    }
    return $user_role;
}

function login($email,$password){
    global $connection;
    if(is_userRole($email) == 'admin'){
        $query = "SELECT * FROM users WHERE username = '{$email}'";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        while($row = mysqli_fetch_array($result)){
        $db_username = $row['username'];
        $db_user_role = $row['user_role'];
        $db_password = $row['password'];
        $db_id = $row['id'];
        }
    if($email == $db_username && $password == $db_password){
        
        $_SESSION['username'] = $db_username;
        $_SESSION['password'] = $db_password;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['admin_id'] = $db_id;
        header("Location: admin/index.php");
    }
    else{echo "<div class='alert alert-danger'><strong>Input the right</strong> Username and password.</div>";}
        
    }//if admin
    
    if(is_userRole($email) == 'user'){
        $query = "SELECT * FROM users WHERE username = '{$email}'";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        while($row = mysqli_fetch_array($result)){
        $db_username = $row['username'];
        $db_user_role = $row['user_role'];
        $db_password = $row['password'];
        $db_id = $row['id'];
        $db_employee =$row['employee'];
        }
    if($email == $db_username && $password == $db_password){
        $_SESSION['username'] = $db_username;
        $_SESSION['password'] = $db_password;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['admin_id'] = $db_id;
        $_SESSION['Uemployee'] = $db_employee;
        header("Location: admin/index.php");
    }
    else{
        echo "<div class='alert alert-danger'><strong>Input the right</strong> Username and password.</div>";
    }
        
    }
    
}

function adminAdd($email,$password){
    $role = "user";
 global $connection;
$query = "INSERT INTO users(username,password,user_role) VALUES ('{$email}','{$password}','{$role}') ";
$result = mysqli_query($connection,$query);
confirmQuery($result);
echo "<script>alert('Successfully Added')</script>";
  
}

//Profile
function validOldPass($oldpassword,$admin_id){
    global $connection;
    $query = "SELECT * FROM users WHERE id = $admin_id";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $db_password = $row['password'];
        if($db_password == $oldpassword){
            return true;
        }else{
            return false;
        }
    }
}

function ValidPassword($email,$password2,$admin_id){
    global $connection;
   $password2 = mysqli_real_escape_string($connection,$password2);
   $query = "UPDATE users SET username = '{$email}' ,password = '{$password2}' WHERE id = {$admin_id}";
   $result = mysqli_query($connection,$query);
   confirmQuery($result);
}

?>
