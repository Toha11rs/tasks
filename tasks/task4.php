<?php
include "connect.php";

header("Content-Type: application/json");

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $path);
$userId = end($segments);
$userId = (int)$userId;

if ($userId == 0) {
    echo "Id не был передан или не является числом";
} 

else {
    $sql = "DELETE FROM products WHERE id = ?";
    
    $send = $conn->prepare($sql);
    $send->bind_param("i", $userId);
    
    if ($send->execute()) {
        echo "Пользователь удален";
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>