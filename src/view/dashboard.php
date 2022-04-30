<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"/>
    <link href="../css/style.css" rel="stylesheet"/>
    <title>Tableau de bord</title>
</head>
<body>
<?php include("header.php"); ?>
<main>
    <?php
    require_once "../lib/File.php";
    require_once File ::build_path([
        "model",
        "Model.php"
    ]);
    date_default_timezone_set("Europe/Paris");

    $pdo = Model ::getPdo();
    $query = $pdo -> query("SELECT * FROM requests ORDER BY creationdate DESC");
    $requests = $query -> fetchAll(PDO::FETCH_OBJ);
    $out_last_requests = "<div id='last-requests'>
                <h5>Derniers enregistrements de rappel</h5>
                <table>
                    <thead>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Créneau</th>
                        <th>Rappel</th>
                    </thead>";
    $out_today_reminder = "<div id='today-reminder'>
                <h5>Rappels du jour</h5>
                <table>
                    <thead>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Créneau</th>
                        <th>Rappel</th>
                    </thead>";
    $count_last_requests = 0;
    $count_today_reminder = 0;

    for($i = 0; $i < min(5, count($requests)); $i++) {
        $item = $requests[$i];

        if($item -> timeslot <= date("Y-m-d H:i:s")) {
            continue;
        }
        $out_last_requests .= "<tr>
            <td>{$item -> forname}</td>
            <td>{$item -> lastname}</td>
            <td>{$item -> email}</td>
            <td>{$item -> phone}</td>
            <td>{$item -> timeslot}</td>
            <td>{$item -> reminder}</td></tr>";
        $count_last_requests++;
    }
    foreach($requests as $item) {
        if($item -> reminder !== date("Y-m-d")) {
            continue;
        }
        $out_today_reminder .= "<tr>
            <td>{$item -> forname}</td>
            <td>{$item -> lastname}</td>
            <td>{$item -> email}</td>
            <td>{$item -> phone}</td>
            <td>{$item -> timeslot}</td>
            <td>{$item -> reminder}</td></tr>";
        $count_today_reminder++;
    }
    if($count_last_requests === 0) {
        $out_last_requests = "<p><em>Aucune demande de rappel enregistrée</em><p>";
    }
    if($count_today_reminder === 0) {
        $out_today_reminder = "<p><em>Aucun rappel aujourd'hui</em></p>";
    }
    echo $out_last_requests . "</table></div>";
    echo $out_today_reminder . "</table></div>";
    ?>
</main>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" type="text/javascript"></script>
<script src="../js/script.js" type="text/javascript"></script>