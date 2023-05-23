<?php

$conn = mysqli_connect("localhost", "root", "", "AMDP3");

// Data Category Tenant
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$searchInput = $_POST['searchInput'];
// echo $searchInput;

$query = "SELECT * FROM `MsTenant` WHERE TenantName LIKE '%$searchInput%'";
$result = mysqli_query($conn, $query);

$response = [];
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
}
// echo $result;
echo json_encode($response);
mysqli_close($conn);