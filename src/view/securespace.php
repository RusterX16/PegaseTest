<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"/>
    <link href="../css/style.css" rel="stylesheet"/>
    <title>Espace sécurisé</title>
</head>
<body>
<?php include("header.php"); ?>
<main>
    <h4>Modifier les créneaux existants</h4>
    <?php
    require_once "../lib/File.php";
    require_once File::build_path([
        "model",
        "Model.php"
    ]);
    $pdo = Model::getPdo();
    $out = "<div id='timeslot'><form method='get' action='../controller/trtTimeslot.php' 
        style='display: flex; flex-direction: column; justify-content: center'>";
    $query = $pdo -> query("SELECT * FROM timeslot");
    $timeslots = $query -> fetchAll(PDO::FETCH_ASSOC);

    for($i = 0, $size = count($timeslots); $i < $size; $i++) {
        $item = $timeslots[$i];
        $out .= "
            <div id='timeslot-element-$i' class='timeslot-element built'>
                <input name='label$i' value='{$item['label']}' readonly/>
                <input style='width: 70px' name='start$i' value='{$item['start']}' readonly/>
                <input style='width: 70px' name='end$i' value='{$item['end']}' readonly/>
                <input name='ts$i' type='checkbox'/>
            </div>";
    }
    if(empty($out)) {
        $out = "<p><em>Aucun créneau existant</em></p>";
    }
    echo $out . "
        <input id='add' type='button' value='+' onclick='addOption()'/>
        <input value='Appliquer' type='submit' style='margin: 16px 0'></form></div>";
    ?>
</main>
<footer>

</footer>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" type="text/javascript"></script>
<script src="../js/script.js" type="text/javascript"></script>