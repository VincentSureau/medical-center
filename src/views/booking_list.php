<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medical Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_navbar.php' ?>
    
    <!-- start form -->
    <div class="container py-5">
        <h1 class="mb-3">Liste des rendez-vous !</h1>

        <?php foreach($result as $booking): ?>
            <div class="card mb-3">
                <div class="card-header">
                    <?php
                        $date = new \DateTime($booking->date);
                        echo $date->format('d/m/Y H:i')
                    ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= strtoupper($booking->lastname) . ' '. $booking->firstname ?></h5>
                    <p class="card-text"><?= $booking->email ?></p>
                    <p class="card-text"><?= $booking->address1 ?></p>
                    <p class="card-text"><?= $booking->address2 ?></p>
                    <p class="card-text"><?= $booking->zip . ' ' . $booking->city ?></p>
                    <a href="#" class="btn btn-primary">Modifier</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!-- end form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>