<?php 
include ("./includes/class-autoload.inc.php");

$tasks = new Tasks;

if (isset($_POST["submit"])) {
    $task = $_POST["task"];
    
    $tasks->addTask($task);
}

if (isset($_POST["saveEdit"])) {
    $id = $_GET["edit"];
    $editTask = $_POST["editTask"];

    $tasks->editTask($id, $editTask);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $tasks->deleteTask($id);
}

