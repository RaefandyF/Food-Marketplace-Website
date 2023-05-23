<?php
session_start();
use function CommonMark\Parse;


$conn = mysqli_connect("localhost", "root", "", "AMDP3");

$email = $_POST['email'];
$password = $_POST['password'];
// echo $password;

$queryPassword = "SELECT * FROM `AllUser`";
$resultPassword = mysqli_query($conn, $queryPassword);
$rowPassword = mysqli_fetch_all($resultPassword, MYSQLI_ASSOC);
$hashPassword = "";
foreach ($rowPassword as $row) {
    if(password_verify($password, $row["UserPassword"])) {
        $hashPassword = $row["UserPassword"];
    }    
}

$query = "SELECT * FROM `AllUser` JOIN `MsRole` ON `AllUser`.`RoleID` = `MsRole`.`RoleID` WHERE `UserEmail` LIKE '$email' AND `UserPassword` LIKE '$hashPassword'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


// echo $row['RoleType'];

if($row['RoleType'] == "Admin") {
    $_SESSION["usernameAdmin"] = $row['UserName'];
    echo "Admin";
} else if($row['RoleType'] == "Tenant") {
    $_SESSION["usernameTenant"] = $row['UserName'];
    echo "Tenant";
} else if($row['RoleType'] == "Customer") {
    $queryCustomer = "SELECT * FROM `MsCustomer` WHERE CustomerEmail LIKE '$email'";
    $resultCustomer = mysqli_query($conn, $queryCustomer);
    $rowCustumer = mysqli_fetch_assoc($resultCustomer);
    $_SESSION["usernameCustomer"] = $row['UserName'];
    $_SESSION["customerId"] = $rowCustumer['CustomerID'];
    echo "Customer";
} else {
    echo "Email atau password salah";
}

mysqli_close($conn);