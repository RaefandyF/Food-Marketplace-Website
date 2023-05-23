<?php

$conn = mysqli_connect("localhost", "root", "", "AMDP3");

$tenantId = $_POST['tenantId'];
$customerId = $_POST['customerId'];
$customerAddress = $_POST['customerAddress'];


$query = "INSERT INTO `TransactionHeader` (`TenantID`, `CustomerID`, `CustomerAddress`) VALUES ('$tenantId', '$customerId', '$customerAddress')";
// $queryAllUser = "INSERT INTO `allUser` (`RoleID`, `UserEmail`, `UserName`, `UserPassword`) VALUES (3, '$email', '$username', '$hash')";

mysqli_query($conn, $query);

echo "Order berhasil diproses";
$queryDelete = "DELETE FROM `Cart` WHERE `Cart`.`CustomerID` = '$customerId'";
mysqli_query($conn, $queryDelete);
// mysqli_query($conn, $queryAllUser);
mysqli_close($conn);