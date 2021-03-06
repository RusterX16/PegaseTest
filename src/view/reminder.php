<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"/>
    <link href="../css/style.css" rel="stylesheet"/>
    <title>Demande de rappel</title>
</head>
<body>
<?php include("header.php"); ?>
<main>
    <form class="form-horizontal" method="post" action="../controller/trtReminder.php">
        <fieldset>
            <legend>Demander un rappel</legend>
            <div class="form-group">
                <label class="col-md-8 control-label" for="lastname">Nom</label>
                <div class="col-md-8">
                    <input required id="lastname" name="lastname" type="text" placeholder="nom"
                           class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="forname">Prénom</label>
                <div class="col-md-8">
                    <input required id="forname" name="forname" type="text" placeholder="prenom"
                           class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="email">Email</label>
                <div class="col-md-8">
                    <input required id="email" name="email" type="email" placeholder="email"
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="phone">Téléphone</label>
                <div class="col-md-8">
                    <input required id="phone" name="phone" type="number" placeholder="téléphone"
                           pattern="/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="timeslot">Créneau</label>
                <?php
                require_once "../lib/File.php";
                require_once File::build_path([
                    "model",
                    "Model.php"
                ]);
                $pdo = Model::getPdo();
                $query = $pdo -> query("SELECT * FROM timeslot");
                $timeslots = $query -> fetchAll(PDO::FETCH_ASSOC);
                $out = "<div style='margin-left: 32px'>";

                for($i = 0, $size = count($timeslots); $i < $size; $i++) {
                    $item = $timeslots[$i];

                    if(!$item["activated"]) {
                        continue;
                    }
                    $out .= "<div class='timeslot-option'>
                        <input id=op' type='radio'>
                        <label for='op'>{$item['label']}</label>
                        <input size='4px' name='start' type='text' value='{$item['start']}' readonly>
                        <input size='4px' name='end' type='text' value='{$item['end']}' readonly>
                        </div>";
                }
                echo $out . "</div>";
                ?>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="reminder">Date de rappel</label>
                <div class="col-md-8">
                    <input required id="reminder" name="reminder" type="date" placeholder="placeholder"
                           class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="message">Message</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="message" name="message"
                              placeholder="Écrivez un commentaire"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <button name="submit" class="btn btn-primary" type="submit">Button</button>
                </div>
            </div>
        </fieldset>
    </form>
</main>
<footer>

</footer>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" type="text/javascript"></script>
<script src="../js/script.js" type="text/javascript"></script>