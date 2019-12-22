<?php include("./slice/db.php"); ?>
<?php
//if(isset($_GET['payslip_id'])){
//    $id = $_GET['payslip_id'];
//    global $connection;
    
    $query = "SELECT * FROM payslip WHERE id = 8";
    $result = mysqli_query($connection,$query);
    while($row=mysqli_fetch_array($result)){
        $id = $row['id'];
        $employee = $row['employee'];
        $year = $row['year'];
        $month = $row['month'];
        $department = $row['department'];
        
        $allowance = $row['allowance'];
        $allow_amnt = $row['allow_amnt'];
        $allow_amnt_2 = $row['allow_amnt_2'];
        $allowance_2 = $row['allowance_2'];
        $total_allow = $row['total_allow'];
        
        $total_deduct = $row['total_deduct'];
        $deduction = $row['deduction'];
        $deduction_2 = $row['deduction_2'];
        $deduction = $row['deduction'];
        $deduct_amnt = $row['deduct_amnt'];
        $deduct_amnt_2 = $row['deduct_amnt_2'];
        $deduction = $row['deduction'];
        
        $net_salary = $row['net_salary'];
        $basic = $row['basic'];
        $total_earns = $basic + $allow_amnt + $allow_amnt_2;
        $total_dept = $deduct_amnt + $deduct_amnt_2;
        
        $sum_total = $total_earns - $total_dept;
    
    }
//}


require_once('fpdf17/fpdf.php');
//A4 width:219mm


$pdf = new FPDF('p','mm','A4');

$pdf -> addPage();

$pdf->SetFont('Arial','B',14);
$pdf->SetDrawColor(50,50,1005);
 
//cell(width,height,text,border,end line, [align])enld

$pdf->cell(130, 7,'GNU PAYROLL SYSTEM', 1, 0);
$pdf->cell(59, 5,'PAYSLIP', 1, 1);// end of line

//set font to arial ,regular, 12pt

$pdf->SetFont('Arial','B',20);

$pdf->cell(189, 20,'', 1, 1);
$pdf->cell(45, 8,'', 0, 0);
$pdf->cell(85, 8,'Payslip for the month of '."$month", 0, 0);
$pdf->cell(59, 8,'', 0, 1);

$pdf->cell(189, 5,'', 1, 1);
$pdf->SetFont('Arial','',9);


    
$pdf->cell(47.25, 7,'Employee id', 1, 0);
$pdf->cell(47.25, 7,"{$id}", 1, 0);
$pdf->cell(47.25, 7,'Name', 1, 0);
$pdf->cell(47.25, 7,"{$employee}", 1, 1);

$pdf->cell(47.25, 7,'Department', 1, 0);
$pdf->cell(47.25, 7,"{$department}", 1, 0);

$query = "SELECT * FROM employee WHERE emp_name = '{$employee}'";
$result = mysqli_query($connection,$query);
while($data=mysqli_fetch_array($result)){
    

$pdf->cell(47.25, 7,'Designation', 1, 0);
$pdf->cell(47.25, 7,"{$data['designation']}", 1, 1);

$pdf->cell(47.25, 7,'Date Of Joining', 1, 0);
$pdf->cell(47.25, 7,"{$data['date_joined']}", 1, 0);
$pdf->cell(47.25, 7,'Account Number', 1, 0);
$pdf->cell(47.25, 7,"{$data['acc_number']}", 1, 1);
    
$pdf->cell(47.25, 7,'Phone Number', 1, 0);
$pdf->cell(47.25, 7,"{$data['contact_1']}", 1, 0);
$pdf->cell(47.25, 7,'Email', 1, 0);
$pdf->cell(47.25, 7,"{$data['email']}", 1, 1);
}

$pdf->cell(189, 20,'', 1, 1);

//thead
$pdf->SetFont('Arial','B',15);
$pdf->cell(47.25, 7,'EARNINGS', 1, 0);
$pdf->cell(47.25, 7,'AMOUNT', 1, 0);
$pdf->cell(47.25, 7,'DEDUCTION', 1, 0);
$pdf->cell(47.25, 7,'AMOUNT', 1, 1);
//tr1
$pdf->SetFont('Arial','',12);
$pdf->cell(47.25, 7,'Basic', 1, 0);
$pdf->cell(47.25, 7,"$basic.00", 1, 0);
$pdf->cell(47.25, 7,"{$deduction}", 1, 0);
$pdf->cell(47.25, 7,"{$deduct_amnt}.00", 1, 1);
//tr2
$pdf->cell(47.25, 7,"{$allowance}", 1, 0);
$pdf->cell(47.25, 7,"{$allow_amnt}.00", 1, 0);
$pdf->cell(47.25, 7,"{$deduction_2}", 1, 0);
$pdf->cell(47.25, 7,"{$deduct_amnt_2}.00", 1, 1);

$pdf->cell(47.25, 7,"{$allowance_2}", 1, 0);
$pdf->cell(47.25, 7,"{$allow_amnt_2}.00", 1, 0);
$pdf->cell(47.25, 7,'', 1, 0);
$pdf->cell(47.25, 7,'', 1, 1);

$pdf->SetFont('Arial','B',12);

$pdf->cell(47.25, 7,'Total', 1, 0);
$pdf->cell(47.25, 7,"{$total_earns}.00", 1, 0);
$pdf->cell(47.25, 7,'Total', 1, 0);
$pdf->cell(47.25, 7,"{$total_dept}.00", 1, 1);

$pdf->cell(47.25, 7,'', 1, 0);
$pdf->cell(47.25, 7,'', 1, 0);
$pdf->cell(47.25, 7,'Net Pay', 1, 0);
$pdf->cell(47.25, 7,"{$sum_total}.00", 1, 1);

$pdf->Output();
?>