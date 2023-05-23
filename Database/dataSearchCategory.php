<?php

$conn = mysqli_connect("localhost", "root", "", "AMDP3");

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$categoryInput = $_POST['categoryInput'];

$query = "SELECT * FROM `MsTenant` WHERE TenantCategory LIKE '$categoryInput'";
$result = mysqli_query($conn, $query);

$response = [];
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
}
echo json_encode($response);

mysqli_close($conn);