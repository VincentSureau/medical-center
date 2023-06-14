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

        <!-- Modal -->
        <div class="modal fade" id="booking-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="card-text" id="modal-email"></p>
                        <p class="card-text" id="modal-address1"></p>
                        <p class="card-text"  id="modal-address2"></p>
                        <p class="card-text"  id="modal-city"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <a id="modal-delete-url" href="#" class="btn btn-danger">Supprimer</a>
                        <a id="modal-edit-url" href="#" class="btn btn-primary">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const modalTitle = document.getElementById('modal-title');
        const modalAddress1 = document.getElementById('modal-address1');
        const modalAddress2 = document.getElementById('modal-address2');
        const modalCity = document.getElementById('modal-city');
        const modalEmail = document.getElementById('modal-email');
        const modalEditUrl = document.getElementById('modal-edit-url');
        const modalDeleteUrl = document.getElementById('modal-delete-url');

        // je récupère l'élément de la modal
        const modal = document.getElementById('booking-modal');
        const bookingModal = bootstrap.Modal.getOrCreateInstance(modal)

        const bookings = <?= json_encode($bookingData) ?>;
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap5',
                initialView: 'timeGridWeek',
                events: bookings,
                locale: 'fr',
                firstDay: 1,
                hiddenDays: [0],
                businessHours: [{
                        daysOfWeek: [1, 2, 3, 4, 5],
                        startTime: '08:00',
                        endTime: '20:00'
                    },
                    {
                        daysOfWeek: [6],
                        startTime: '09:00', // 10am
                        endTime: '12:00' // 4pm
                    }
                ],
                slotMinTime: '08:00',
                slotMaxTime: '20:00',
                eventClick: function(info) {
                    var eventObj = info.event;
                    // je récupère mes info additionnelles
                    const props = eventObj.toJSON().extendedProps;

                    console.log(props)
                    modalTitle.textContent = eventObj.title + ' ' + eventObj.start.toLocaleString();
                    modalAddress1.textContent = props.address1;
                    modalAddress2.textContent = props.address2;
                    modalCity.textContent = props.city;
                    modalEmail.textContent = props.email;
                    modalEditUrl.href = "?page=booking_edit&id=" + props.booking_id;
                    modalDeleteUrl.href = "?page=booking_delete&id=" + props.booking_id;
                    // je montre la modal
                    bookingModal.show();
                },
            });
            calendar.render();
        });
    </script>
</body>

</html>