<?php
session_start();


$conn = mysqli_connect("localhost", "root", "", "AMDP3");

// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$customerId = $_POST['customerId'];


$query = "SELECT `Cart`.`CustomerId`, `MsCustomer`.`CustomerUsername`, `MsTenant`.`TenantID`,`MsTenant`.`TenantName`, `MsProduct`.`ProductID`, `MsProduct`.`ProductName`, COUNT(`Cart`.ProductID) AS 'ProductCount', SUM(`MsProduct`.`ProductPrice`) AS 'ProductTotal' 
            FROM `Cart` JOIN `MsProduct` ON `Cart`.`ProductID` = `MsProduct`.`ProductID` JOIN `MsTenant` ON `MsProduct`.`TenantID` = `MsTenant`.`TenantID` JOIN `MsCustomer` ON `Cart`.`CustomerID` = `MsCustomer`.`CustomerID`  
            WHERE `Cart`.`CustomerID` LIKE '$customerId' GROUP BY `MsCustomer`.`CustomerId`, `MsCustomer`.`CustomerUsername`, `MsTenant`.`TenantID`, `MsTenant`.`TenantName`, `MsProduct`.`ProductID`, `MsProduct`.`ProductName`";
$result = mysqli_query($conn, $query);

$response = [];
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
}
// echo $result;
echo json_encode($response);