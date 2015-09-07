<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

require_once("dbconf.php");

$conn = new mysqli($db_rw_host, $db_rw_user, $db_rw_pass, $db_rw_db);

$data = json_decode(file_get_contents("php://input"));
$FirstName = mysqli_real_escape_string($conn, $data->FirstName);
$LastName = mysqli_real_escape_string($conn, $data->LastName);
$Address = mysqli_real_escape_string($conn, $data->Address);
$City = mysqli_real_escape_string($conn, $data->City);
$State = mysqli_real_escape_string($conn, $data->State);
$Zip = mysqli_real_escape_string($conn, $data->Zip);
$HomePhone = mysqli_real_escape_string($conn, $data->HomePhone);
$CellPhone = mysqli_real_escape_string($conn, $data->CellPhone);
$WorkPhone = mysqli_real_escape_string($conn, $data->WorkPhone);
$Email = mysqli_real_escape_string($conn, $data->Email);
$Image = mysqli_real_escape_string($conn, $data->Image);

$sql = 'INSERT INTO directory values ("';
$sql .= $FirstName . '","';
$sql .= $LastName . '","';
$sql .= $Address . '","';
$sql .= $City . '","';
$sql .= $State . '","';
$sql .= $Zip . '","';
$sql .= $HomePhone . '","';
$sql .= $CellPhone . '","';
$sql .= $WorkPhone . '","';
$sql .= $Email . '","';
$sql .= $Image . '")';

$result = $conn->query($sql) or trigger_error($conn->error."[$sql]");

$conn->close();
?>