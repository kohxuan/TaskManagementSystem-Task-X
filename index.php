<?php
session_start();

if (!isset($_SESSION['username'])) { //If no data in username
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$users_id = $_SESSION['users_id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add the following lines inside the <head> tag of your HTML -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <!-- ... (existing head content) ... -->

    <style>
        th,
        td {
            max-width: 150px;
            overflow: hidden;
            white-space: nowrap;
            /*text-overflow: ellipsis;*/
        }

        .container {
            overflow-x: auto;
        }

        .fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: rgb(64, 92, 123);
            z-index: 999;
            /* Ensure it's above the page content */
            border-bottom: 2px solid lightgray;
            padding-bottom: 10px;
        }

        .content-container {
            margin-top: 210px;
            /* Default padding */
        }

        /* Media query to adjust padding for smaller screens */
        @media (max-width: 768px) {
            .content-container {
                margin-top: 260px;
                /* Adjusted padding for smaller screens */
            }
        }

        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            margin-bottom: 20px;
        }

        .dataTables_filter input {
            margin-left: 5px;
            display: inline-block;
            width: auto;
            vertical-align: middle;
        }

        .filter-btn-group {
            float: right;
            margin-bottom: 20px;
            margin-right: 10px;
        }

        .filter-btn-group .btn {
            margin-left: 5px;
        }

        .filter-dropdown {
            margin-bottom: 20px;
            margin-right: 10px;
        }

        .button-container {
            display: flex;
            flex-wrap: wrap;
            /* Allow buttons to wrap to the next line if needed */
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .button-container a,
        .button-container button {
            margin-bottom: 10px;
            flex-basis: 48%;
            /* Adjust the width of the buttons based on your preference */
        }

        .button-container .btn-logout {
            flex-basis: 100%;
            /* Ensure the logout button takes full width */
        }

        .button-container .btn-outline-light:last-child {
            margin-right: 0;
        }

        /* Style for the Logout button */
        .button-container .btn-logout {
            margin-left: auto;
            /* Push the button to the right */
        }
    </style>
</head>

<body>
    <div class="flex-container">
        <div class="fixed-header">
            <div class="container">
                <h2 style="color: white; margin-bottom: 20px; margin-top: 20px;">Daily Task Management System</h2>

                <!-- Updated button layout -->
                <div class="button-container">
                    <!-- Task-related buttons -->
                    <div>
                        <a href="create_form.php" class="btn btn-outline-light">Create Task</a>
                        <a href="calendar_view.php" class="btn btn-outline-light">Calendar View</a>
                        <a href="export.php" class="btn btn-outline-light">Export Tasks</a>
                    </div>

                    <!-- Import button with file input -->
                    <form action="import.php" method="post" enctype="multipart/form-data" style="color: white;">
                        <label for="file">Import Tasks:</label>
                        <input type="file" name="file" id="file" accept=".csv">
                        <button type="submit" class="btn btn-outline-light">Import</button>
                    </form>

                    <!-- Logout button -->
                    <a href="logout.php" class="btn btn-outline-light btn-logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container content-container">
        <div class="filter-dropdown">
            <select class="form-control" id="filterDropdown">
                <option value="">Filter</option>
                <option value="clearFilters">Clear Filters</option>
                <option value="High">High Priority</option>
                <option value="Medium">Medium Priority</option>
                <option value="Low">Low Priority</option>
                <option value="Completed">Completed</option>
                <option value="Incomplete">Incomplete</option>
                <!-- Add more filter options as needed -->
            </select>
        </div>
        <table class="table" id="taskTable" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Task</th>
                    <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Title</th>
                    <th class="col-4" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Content</th>
                    <th>Due Date</th>
                    <th>Priority
                        <!-- <select id="priority-filter">
                            <option value="">All</option>
                        </select> -->
                    </th>
                    <th>Category
                        <select id="category-filter">
                            <option value="">All</option>
                        </select>
                    </th>
                    <th>Completion Status
                        <!-- <select id="completion-filter">
                            <option value="">All</option>
                        </select> -->
                    </th>
                    <th>Date Created</th>
                    <th>Date Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'read.php';
                ?>
            </tbody>
        </table>

        <script>
            // Activate DataTables on the table with ID 'taskTable'
            $(document).ready(function() {
                var table = $('#taskTable').DataTable();

                // Add change event handler for filter dropdown
                $('#filterDropdown').on('change', function() {
                    var selectedFilter = $(this).val();
                    if (selectedFilter === 'clearFilters') {
                        table.search('').columns().search('').draw();
                    } else {
                        var filterColumnIndex;
                        if (selectedFilter === 'Completed' || selectedFilter === 'Incomplete') {
                            filterColumnIndex = $('#taskTable th:contains("Completion Status")').index();
                        } else {
                            filterColumnIndex = $('#taskTable th:contains("Priority")').index();
                        }

                        // Clear previous search
                        table.columns().search('').draw();

                        // Apply new search based on the selected filter
                        if (selectedFilter === 'Completed') {
                            table.column(filterColumnIndex).search('Completed', true, false).draw();
                        } else if (selectedFilter === 'Incomplete') {
                            table.column(filterColumnIndex).search('Incomplete', true, false).draw();
                        } else {
                            table.column(filterColumnIndex).search(selectedFilter, true, false).draw();
                        }
                    }
                });

                // Fetch unique categories from the table
                var uniqueCategories = Array.from(new Set(table.column(5).data().toArray()));

                // Populate the Category filter dropdown with options
                var categoryFilterDropdown = $('#category-filter');
                categoryFilterDropdown.empty(); // Clear existing options

                // Add the 'All' option
                categoryFilterDropdown.append($('<option>', {
                    value: '',
                    text: 'All'
                }));

                // Add options based on unique categories
                uniqueCategories.forEach(function(category) {
                    categoryFilterDropdown.append($('<option>', {
                        value: category,
                        text: category
                    }));
                });

                // Add change event handler for category filter dropdown
                categoryFilterDropdown.on('change', function(e) {
                    // Stop the click event propagation
                    e.stopPropagation();

                    var selectedCategory = $(this).val();
                    if (selectedCategory === '') {
                        table.columns(5).search('').draw(); // 5 is the index of the Category column
                    } else {
                        table.columns(5).search(selectedCategory).draw(); // 5 is the index of the Category column
                    }
                });

                // Add click event handler for category filter dropdown to stop propagation
                categoryFilterDropdown.on('click', function(e) {
                    e.stopPropagation();
                });

                // Add more filter options or event handlers as needed
            });
        </script>

    </div>
</body>

</html>