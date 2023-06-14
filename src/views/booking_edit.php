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
        <h1 class="mb-3">Modifier le rendez-vous !</h1>
        <?php if(array_key_exists('booking', $errors)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $errors['booking'] ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="?page=booking_edit&id=<?= $booking->getId() ?>" class="needs-validation" novalidate="">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Prénom</label>
                    <input value="<?= $data['firstname'] ?>" name="firstname" type="text" class="form-control <?= array_key_exists('firstname', $errors) ? "is-invalid" : "" ?>" id="firstName" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        <?= array_key_exists('firstname', $errors) ? $errors['firstname'] : "" ?>
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Nom de famille</label>
                    <input value="<?= $data['lastname'] ?>" name="lastname" type="text" class="form-control <?= array_key_exists('lastname', $errors) ? "is-invalid" : "" ?>" id="lastName" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        <?= array_key_exists('lastname', $errors) ? $errors['lastname'] : "" ?>
                    </div>
                </div>
					
                <div class="col-12">
                    <label for="date" class="form-label">Date et heure</label>
                    <input value="<?= $data['date'] ?>" name="date" type="datetime-local" class="form-control <?= array_key_exists('date', $errors) ? "is-invalid" : "" ?>" id="date" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        <?= array_key_exists('date', $errors) ? $errors['date'] : "" ?>
                    </div>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input value="<?= $data['email'] ?>" name="email" type="email" class="form-control <?= array_key_exists('email', $errors) ? "is-invalid" : "" ?>" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        <?= array_key_exists('email', $errors) ? $errors['email'] : "" ?>
                    </div>
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Addresse</label>
                    <input value="<?= $data['address1'] ?>" name="address1" type="text" class="form-control <?= array_key_exists('address1', $errors) ? "is-invalid" : "" ?>" id="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback">
                        <?= array_key_exists('address1', $errors) ? $errors['address1'] : "" ?>
                    </div>
                </div>

                <div class="col-12">
                    <label for="address2" class="form-label">Complément d'adresse <span class="text-body-secondary">(Optional)</span></label>
                    <input value="<?= $data['address2'] ?>" name="address2" type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>

                <div class="col-12">
                    <label for="zip" class="form-label">Code postal</label>
                    <input value="<?= $data['zip'] ?>" name="zip" type="text" class="form-control <?= array_key_exists('zip', $errors) ? "is-invalid" : "" ?>" id="zip" placeholder="" required="">
                    <div class="invalid-feedback">
                        <?= array_key_exists('zip', $errors) ? $errors['zip'] : "" ?>
                    </div>
                </div>

                <div class="col-12">
                    <label for="city" class="form-label">City</label>
                    <input value="<?= $data['city'] ?>" name="city" type="text" class="form-control <?= array_key_exists('city', $errors) ? "is-invalid" : "" ?>" id="city" placeholder="" required="">
                    <div class="invalid-feedback">
                        <?= array_key_exists('city', $errors) ? $errors['city'] : "" ?>
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