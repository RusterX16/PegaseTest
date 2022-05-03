<?php
require_once "../lib/File.php";
require_once File::build_path([
    "model",
    "Model.php"
]);

$pdo = Model::getPdo();
$query = $pdo -> query("SELECT * FROM timeslot");
$timeslots = $query -> fetchAll(PDO::FETCH_ASSOC);

for($i = 0, $size = count($timeslots); $i < $size; $i++) {
    $item = $timeslots[$i];
    $state = isset($_GET["ts" . $i]);
    $start = $item["start"];
    $end = $item["end"];

    $query = $pdo -> prepare("UPDATE timeslot SET activated=:state WHERE start=:start AND end=:end");
    $values = [
        "state" => isset($_GET["ts$i"]) ? 1 : 0,
        "start" => $item["start"],
        "end" => $item["end"],
    ];
    $query -> execute($values);
}
header("Location:../view/home.php");