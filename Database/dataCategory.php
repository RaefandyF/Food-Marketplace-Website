<?php

$conn = mysqli_connect("localhost", "root", "", "AMDP3");

// Data Category Tenant

$queryCategory = "SELECT * FROM MsTenantCategory";
$resultCategory = mysqli_query($conn, $queryCategory);

$responseCategory = [];
if(mysqli_num_rows($resultCategory) > 0) {
    while($row = mysqli_fetch_assoc($resultCategory)) {
        $responseCategory[] = $row;
    }
}

echo json_encode($responseCategory);