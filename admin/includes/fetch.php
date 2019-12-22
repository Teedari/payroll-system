<?php include("../slice/db.php");?>
<?php 

global $connection;

$output = '';
$query = "SELECT * FROM state WHERE country_id = '".$_POST['countryId']."'";
$result = mysqli_query($connection,$query);
$output = '<option value="">Select</option>';
while($row = mysqli_fetch_array($result)){
$output .= '<option value="'.$row["state_id"].'">'.$row["state_name"].'</option>';
}

echo $output;
?>