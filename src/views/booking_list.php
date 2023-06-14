<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medical Center</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
</head>

<body>
    <?php require 'partials/_navbar.php' ?>
    
    <!-- start form -->
    <div class="container py-5">
        <h1 class="mb-3">Liste des rendez-vous !</h1>

        <div id="calendar"></div>

        <?php foreach($result as $booking): ?>
            <div class="card mb-3">
                <div class="card-header">
                    <?= $booking->formatDate() ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $booking->formatLastname() . ' '. $booking->getFirstname() ?></h5>
                    <p class="card-text"><?= $booking->getEmail() ?></p>
                    <p class="card-text"><?= $booking->getAddress1() ?></p>
                    <p class="card-text"><?= $booking->getAddress2() ?></p>
                    <p class="card-text"><?= $booking->getZip() . ' ' . $booking->getCity() ?></p>
                    <a href="#" class="btn btn-primary">Modifier</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!-- end form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const bookings = <?= json_encode($bookingData) ?>;
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap5',
                initialView: 'timeGridWeek',
                events: bookings,
                locale: 'fr',
                firstDay: 1,
                hiddenDays: [ 0 ],
                businessHours: [
                    {
                        daysOfWeek: [ 1, 2, 3, 4, 5 ],
                        startTime: '08:00',
                        endTime: '20:00'
                    },
                    {
                        daysOfWeek: [ 6 ],
                        startTime: '09:00', // 10am
                        endTime: '12:00' // 4pm
                    }
                ],
                slotMinTime: '08:00',
                slotMaxTime: '20:00'
            });
            calendar.render();
        });

    </script>
</body>

</html>