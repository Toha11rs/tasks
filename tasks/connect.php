<?php
$user = "root";
$password = "";
$db = "test_db";

$conn = new mysqli("localhost", $user,$password,$db) or die("Подключение прервано");
?>