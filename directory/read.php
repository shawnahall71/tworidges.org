<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

require_once("dbconf.php");

$conn = new mysqli($db_ro_host, $db_ro_user, $db_ro_pass, $db_ro_db);

if (htmlspecialchars($_GET["q"]) === "count") {
    $sqlcount = "SELECT count(*) FROM directory";
    $resultcount = $conn->query($sqlcount) or trigger_error($conn->error."[$sqlcount]");
    $outp = $resultcount->fetch_array(MYSQLI_NUM)[0];
    echo($outp);
    $conn->close();
    exit(0);
}
if (is_numeric($_GET["offset"]) && is_numeric($_GET["limit"])) {
    $sql = "SELECT FirstName, LastName, Address, City, State, Zip, HomePhone, CellPhone, WorkPhone, Email, Image ";
    $sql .= "FROM directory ";
    $sql .= "ORDER BY LastName ";
    $sql .= "LIMIT " . $_GET["offset"] . "," . $_GET["limit"];

    $result = $conn->query($sql) or trigger_error($conn->error."[$sql]");

    $jsonarray = array();
    while($row = mysqli_fetch_assoc($result))
    {
        array_push($jsonarray, $row);
    }
    echo json_encode($jsonarray);

    $conn->close();
}
?>