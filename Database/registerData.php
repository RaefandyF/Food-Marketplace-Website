<?php

$conn = mysqli_connect("localhost", "root", "", "AMDP3");

$email = $_POST['email'];
$username = $_POST['username'];
$noTelepon = $_POST['noTelepon'];
$password = $_POST['password'];

$hash = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO `MsCustomer` (`RoleID`, `CustomerEmail`, `CustomerUsername`, `CustomerPhone`, `CustomerPassword`) VALUES (3, '$email', '$username', '$noTelepon', '$hash')";
$queryAllUser = "INSERT INTO `allUser` (`RoleID`, `UserEmail`, `UserName`, `UserPassword`) VALUES (3, '$email', '$username', '$hash')";

mysqli_query($conn, $query);
mysqli_query($conn, $queryAllUser);
mysqli_close($conn);