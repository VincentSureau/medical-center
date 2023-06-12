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
        <h1 class="mb-3">Prendre rendez-vous !</h1>
        <form class="needs-validation" novalidate="">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Nom de famille</label>
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
					
                <div class="col-12">
                    <label for="date" class="form-label">Date et heure</label>
                    <input type="datetime-local" class="form-control" id="date" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        Valid date is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Addresse</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="col-12">
                    <label for="address2" class="form-label">Complément d'adresse <span class="text-body-secondary">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>

                <div class="col-12">
                    <label for="zip" class="form-label">Code postal</label>
                    <input type="text" class="form-control" id="zip" placeholder="" required="">
                    <div class="invalid-feedback">
                        Zip code required.
                    </div>
                </div>
            </div>

            <button class="w-100 btn btn-dark btn-lg mt-3" type="submit">Prendre rendez-vous</button>
        </form>
    </div>
    <!-- end form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>