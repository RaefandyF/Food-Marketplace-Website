<?php

$conn = mysqli_connect("localhost", "root", "", "AMDP3");

$tenantCategoryId = $_POST['tenantCategoryId'];
$tenantName = $_POST['tenantName'];
$tenantRating = $_POST['tenantRating'];
$tenantCategory = $_POST['tenantCategory'];
$tenantIMG = $_POST['tenantIMG'];
$tenantEmail = $_POST['tenantEmail'];
$tenantPassword = $_POST['tenantPassword'];

$query = "INSERT INTO `MsTenant` (`CategoryID`, `TenantName`, `TenantRating`, `TenantCategory`, `TenantIMG`, `TenantEmail`, `TenantPassword`) VALUES ($tenantCategoryId, '$tenantName', '$tenantRating', '$tenantCategory', '$tenantIMG', '$tenantEmail', '$tenantPassword')";
$queryAllUser = "INSERT INTO `allUser` (`RoleID`, `UserEmail`, `UserPassword`) VALUES (2, '$tenantEmail', '$tenantPassword')";
mysqli_query($conn, $query);
mysqli_query($conn, $queryAllUser);
mysqli_close($conn);