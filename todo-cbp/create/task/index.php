<?php
require("http://localhost/todo/db.php");

$task = $_POST["task"];

// INSERT NEW TASK.
$newTask = $pdo->prepare("INSERT INTO tasks (task, account_id) VALUES
(AES_ENCRYPT(:task, 'yanyan'), :id)");
$newTask->bindParam(":task", $task);
$newTask->bindParam(":id", $_COOKIE["id"]);
$newTask->execute();

header("location:http://localhist/todo");
?>