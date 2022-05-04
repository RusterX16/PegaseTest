<?php
require_once "../lib/File.php";
require_once File ::build_path([
    "model",
    "Model.php"
]);

/*
echo "<pre>";
var_dump($_GET);
echo "</pre>";
*/

$pdo = Model ::getPdo();

for($i = 0; true; $i++) {
    if(!isset($_GET["label$i"])) {
        header("Location:../view/home.php");
        return;
    }
    $label = $_GET["label$i"];
    $sql = "SELECT * FROM timeslot WHERE label=:label";
    $query = $pdo -> prepare($sql);
    $query -> execute(["label" => $_GET["label$i"]]);
    $result = $query -> fetchAll();

    if(count($result) === 0) {
        $sql = "INSERT INTO timeslot VALUES (:start, :end, :label, :activated)";
        $query = $pdo -> prepare($sql);
        $query -> execute([
            "start" => $_GET["start$i"],
            "end" => $_GET["end$i"],
            "label" => $_GET["label$i"],
            "activated" => isset($_GET["ts$i"]) ? 1 : 0,
        ]);
    } else {
        if(isset($_GET["delete$i"])) {
            $sql = "DELETE FROM timeslot WHERE label=:label";
            $query = $pdo -> prepare($sql);
            $query -> execute([
                "label" => $_GET["label$i"],
            ]);
        } else {
            $sql = "UPDATE timeslot SET activated=:activated WHERE label=:label";
            $query = $pdo -> prepare($sql);
            $query -> execute([
                "activated" => isset($_GET["activate$i"]) ? 1 : 0,
                "label" => $_GET["label$i"],
            ]);
        }
    }
}