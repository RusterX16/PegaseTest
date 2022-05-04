<?php
session_start();
require_once "../lib/File.php";
require_once File::build_path([
    "model",
    "Model.php"
]);

$pdo = Model::getPdo();
$query = $pdo -> prepare("
    INSERT INTO requests(email, forname, lastname, phone, start, end, reminder) 
    VALUES (:email, :forname, :lastname, :phone, :start, :end, :reminder)
");

var_dump($_POST);

$values = [
    "lastname" => $_POST["lastname"],
    "forname" => $_POST["forname"],
    "email" => $_POST["email"],
    "phone" => $_POST["phone"],
    "start" => $_POST["timeslot"],
    "reminder" => $_POST["reminder"],
];
$query -> execute($values);
header("Location:../view/home.php");