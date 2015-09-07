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

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"FirstName":"'. $rs["FirstName"] . '",';
        $outp .= '"LastName":"'  . $rs["LastName"]  . '",';
        $outp .= '"Address":"'   . $rs["Address"]   . '",';
        $outp .= '"City":"'      . $rs["City"]      . '",';
        $outp .= '"State":"'     . $rs["State"]     . '",';
        $outp .= '"Zip":"'       . $rs["Zip"]       . '",';
        $outp .= '"HomePhone":"' . $rs["HomePhone"] . '",';
        $outp .= '"CellPhone":"' . $rs["CellPhone"] . '",';
        $outp .= '"WorkPhone":"' . $rs["WorkPhone"] . '",';
        $outp .= '"Email":"'     . $rs["Email"]     . '",'; 
        $outp .= '"Image":"'     . $rs["Image"]     . '"}';
    }
    $outp .= "]";
    echo($outp);
    $conn->close();
}
?>