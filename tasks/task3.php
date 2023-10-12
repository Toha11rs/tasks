<?php
include "connect.php";

header("Content-Type: application/json");


$sql = "SELECT name FROM products";
$result = $conn->query($sql);

if ($result) {
    $users = array();

    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    $response = array("users" => $users);
    echo json_encode($response); 
} else {
    echo json_encode(array("Error" => "Ошибка"));
}

$conn->close();
?>