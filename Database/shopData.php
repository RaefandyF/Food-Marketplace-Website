<?php
session_start();


$conn = mysqli_connect("localhost", "root", "", "AMDP3");

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$tenantId = $_POST['tenantId'];
$customerId = $_POST['customerId'];


$query = "SELECT * FROM `MsProduct` JOIN MsTenant ON `MsProduct`.`TenantID`= `MsTenant`.`TenantID` WHERE `MsProduct`.TenantID LIKE '$tenantId'";
$result = mysqli_query($conn, $query);

$response = [];
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
}
// echo $result;
echo json_encode($response);
$dataProduct = json_encode($response);

$_SESSION["dataProduct"] = $dataProduct;
$_SESSION["customerId"] = $customerId;

// echo $_SESSION["customerId"];
mysqli_close($conn);