<?php

$conn = mysqli_connect("localhost", "root", "", "AMDP3");

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$productId = $_POST['productId'];
$customerId = $_POST['customerId'];


$querySearch = "SELECT * FROM `MsProduct` WHERE ProductID LIKE '$productId'";
$result = mysqli_query($conn, $querySearch);
$row = mysqli_fetch_assoc($result);

$tenantId = $row['TenantID'];

$queryValidation = "SELECT * FROM `Cart` WHERE `TenantID` LIKE '$tenantId' AND `CustomerID` LIKE '$customerId'";
$queryValidation2 = "SELECT * FROM `Cart` WHERE `CustomerID` LIKE '$customerId'";
$resultValidation = mysqli_query($conn, $queryValidation);
$resultValidation2 = mysqli_query($conn, $queryValidation2);
$rowValidation = mysqli_fetch_assoc($resultValidation);
$rowValidation2 = mysqli_fetch_assoc($resultValidation2);
$validation = $rowValidation == null;
$validation2 = $rowValidation2 == null;

if ($validation2 == 1) {
    $queryInsert = "INSERT INTO `Cart` (`TenantID`, `ProductID`, `CustomerID`) VALUES ('$tenantId', '$productId', '$customerId')";
    $resultInsert = mysqli_query($conn, $queryInsert);
    echo "Produk berhasil dimasukkan ke keranjang";
} else {
    if ($validation == 1) {
        echo "Kamu harus memasukkan product dari tenant yang sama";
    } else {
        $queryInsert = "INSERT INTO `Cart` (`TenantID`, `ProductID`, `CustomerID`) VALUES ('$tenantId', '$productId', '$customerId')";
        $resultInsert = mysqli_query($conn, $queryInsert);
        echo "Produk berhasil dimasukkan ke keranjang";
    }
}


// $queryAllUser = "INSERT INTO `allUser` (`RoleID`, `UserEmail`, `UserPassword`) VALUES (2, '$tenantEmail', '$tenantPassword')";
// mysqli_query($conn, $queryAllUser);
mysqli_close($conn);