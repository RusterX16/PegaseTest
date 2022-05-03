<?php
session_start();
require_once "../lib/File.php";
require_once File::build_path([
    "model",
    "Model.php"
]);

$pdo = Model::getPdo();
$query = $pdo -> query("SELECT * FROM requests");
$users = $query -> fetchAll(PDO::FETCH_ASSOC);

$query = $pdo -> prepare("
    INSERT INTO requests(email, forname, lastname, phone, timeslot, reminder) 
    VALUES (:email, :forname, :lastname, :phone, :timeslot, :reminder)
");
$values = [
    "lastname" => $_POST["lastname"],
    "forname" => $_POST["forname"],
    "email" => $_POST["email"],
    "phone" => $_POST["phone"],
    "timeslot" => $_POST["timeslot"],
    "reminder" => $_POST["reminder"],
];
$query -> execute($values);
header("Location:../view/home.php");