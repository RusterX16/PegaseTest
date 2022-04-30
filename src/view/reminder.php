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
                    <input required id="lastname" name="lastname" type="text" placeholder="nom" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="forname">Prénom</label>
                <div class="col-md-8">
                    <input required id="forname" name="forname" type="text" placeholder="prenom" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="email">Email</label>
                <div class="col-md-8">
                    <input required id="email" name="email" type="text" placeholder="email" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="phone">Téléphone</label>
                <div class="col-md-8">
                    <input required id="phone" name="phone" type="number" placeholder="téléphone" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="timeslot">Créneau</label>
                <div class="col-md-8">
                    <input required id="timeslot" name="timeslot" type="datetime-local" placeholder="placeholder" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="reminder">Date de rappel</label>
                <div class="col-md-8">
                    <input required id="reminder" name="reminder" type="date" placeholder="placeholder" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="message">Message</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="message" name="message" placeholder="Écrivez un commentaire"></textarea>
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
<script>window.onload = function() { initDate() }</script>