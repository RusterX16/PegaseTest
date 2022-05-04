<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"/>
    <link href="../css/style.css" rel="stylesheet"/>
    <title>Rappels</title>
</head>
<?php include("header.php"); ?>
<body>
<main>
    <?php
    require_once "../lib/File.php";
    require_once File::build_path([
        "model",
        "Model.php"
    ]);

    $pdo = Model::getPdo();
    $query = $pdo -> query("SELECT * FROM requests");
    $requests = $query -> fetchAll(PDO::FETCH_ASSOC);
    $out = "<div id='last-requests'>
                <h5>Demandes de rappel enregistrées</h5>
                <table>
                    <thead>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Date</th>
                        <th>Créneau</th>
                    </thead>";

    foreach($requests as $item) {
        $out .= "<tr>
            <td>{$item['forname']}</td>
            <td>{$item['lastname']}</td>
            <td>{$item['email']}</td>
            <td>{$item['phone']}</td>
            <td>{$item['reminder']}</td>
            <td>{$item['start']} - {$item['end']}</td></tr>";
    }
    if(empty($requests)) {
        $out = "<p><em>Aucune demande de rappel enregistrée</em></p>";
    }
    echo $out;
    ?>
</main>
<footer>

</footer>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" type="text/javascript"></script>
<script src="../js/script.js" type="text/javascript"></script>