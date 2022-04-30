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
$error = false;

if(!preg_match("/^[\w\.]+@([\w-]+\.)+[\w-]{2,4}$/", $_POST["email"])) {
    echo "<p>L'email est invalide</p>";
    $error = true;
}

if(!preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/", $_POST["phone"])) {
    echo "<p>Le numéro de téléphone est invalide</p>";
    $error = true;
}

/*
for($i = 0, $size = count($users); $i < $size; $i++) {
    if($users[$i]["email"] === $_POST["email"]) {
        echo "<p>L'email est déjà associée</p>";
        $error = true;
    }
    if($users[$i]["phone"] === $_POST["phone"]) {
        echo "<p>Le numéro de téléphone est déjà associé</p>";
        $error = true;
    }
}
*/

if($error) {
    echo "<a href='../view/reminder.php'>Revenir au formulaire</a>";
    return;
}

date_default_timezone_set("Europe/Paris");

$query = $pdo -> prepare("INSERT INTO requests(email, forname, lastname, phone, timeslot, reminder) VALUES (:email, :forname, :lastname, :phone, :timeslot, :reminder)");
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