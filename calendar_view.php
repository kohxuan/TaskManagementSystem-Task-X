<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Georgia;
        }

        .container {
            margin-top: 20px;
            text-align: center;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            /* font-family: 'Arial', sans-serif; */
        }

        .fc-header {
            background-color: #343a40;
            color: #fff;
            border: none;
            border-radius: 8px 8px 0 0;
        }

        .fc-button-group {
            margin-right: 10px;
        }

        .fc-day-number {
            color: #343a40;
        }

        .fc-event, .fc-agenda .fc-event-time { 
            /* Event color */
            background-color: #405c7b;
            color: #fff;
            border: none;
            border-radius: 2px;
            padding: 4px;
        }

        .fc-event-title {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .fc-today {
            background-color: #cab3be !important;
            font-family: Georgia;
        }

        .fc-event:hover {
            background-color: #26374a;
        }

        .fc-event a {
            color: #fff;
            text-decoration: none;
        }

        .fc-prev-button, .fc-next-button, .fc-today-button {
            background-color: #405c7b !important;
            color: #fff;
            border: none;
            border-radius: 3px;
        }

        .btn-back {
            margin-top: 20px;
            /* margin-right: 20px; */
            background-color: #343a40;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
            float: right;
        }

        .btn-back:hover {
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Calendar View</h2>
        <a href="index.php" class="btn btn-back" style="margin-bottom: 20px;">Back to Tasks</a>

        <div id="calendar" style="margin-top: 100px;"></div>
    </div>

    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: [
                    <?php
                    include 'db_1.php';
                    session_start(); // Start the session
                    $users_id = $_SESSION['users_id']; // Retrieve the users_id from the session

                    // Fetch tasks for the specific user from the database
                    $sql = "SELECT * FROM notes WHERE users_id = $users_id";
                    $result = $conn->query($sql);

                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            $due_date = new DateTime($row["due_date"]);
                            $formattedDate = $due_date->format('Y-m-d');

                            echo '{
                                    title: "' . $row["title"] . '",
                                    start: "' . $formattedDate . '",
                                    url: "update_form.php?id=' . $row["id"] . '"
                                  },';
                        }
                    }
                    ?>
                ],
                eventClick: function (event) {
                    window.location.href = event.url;
                    return false;
                }
            });
        });
    </script>
</body>

</html>
