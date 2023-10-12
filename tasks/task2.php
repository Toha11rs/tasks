<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
        <input name = "input_name"></input><br>
        <button name = "sumbit">Добавить</button>

    </form>
</body>
</html>


<?php
include 'connect.php';

$date = date('Y-m-d H:i:s');

if (isset($_POST["input_name"])){
    $name = $_POST["input_name"];
    
    $sql = "INSERT INTO products (name, created_at, updated_at ) VALUES (?,?,?)";
    
    $send = $conn->prepare($sql);
    $send->bind_param("sss", $name, $date, $date); 
    
    if ($send->execute()) {
        echo "Пользователь создан";
    }
    
    else {
        echo "Error: " . $conn->error;
    }
    $send->close();
    $conn->close();
}
    
?>