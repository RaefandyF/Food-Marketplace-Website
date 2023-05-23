<?php

$conn = mysqli_connect("localhost", "root", "", "AMDP3");

// Data Tenant

$queryTenant = "SELECT * FROM MsTenant";
$resultTenant = mysqli_query($conn, $queryTenant);

$responseTenant = [];
if(mysqli_num_rows($resultTenant) > 0) {
    while($row = mysqli_fetch_assoc($resultTenant)) {
        $responseTenant[] = $row;
    }
}
echo json_encode($responseTenant);

mysqli_close($conn);