<!DOCTYPE html>
<html>

<head>
    <title>Create Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--<script src="path/to/jscolor.js"></script>
    <script>
        jscolor.installByClassName("color");
    </script>-->
    <style>
        .color-palette {
            display: flex;
        }

        .color-option {
            width: 30px;
            height: 30px;
            border: 2px solid #EAEDED;
            margin-right: 20px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .selected-color {
            border: 2px solid gray;
            /* Highlight the selected color with a black border */
        }

        .required-label::after {
            content: " *";
            color: red;
        }
    </style>
</head>

<body>
    <style>
        body {
            background-color: <?php echo $row['color']; ?>;
        }
    </style>
    <div class="container">
        <div class="note" style="background-color: <?php echo $note['color']; ?>">
            <h2>Create Task</h2>
            <form method="post" action="create_process.php">
                <div class="form-group">
                    <label class="required-label">Title:</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="required-label">Content:</label>
                    <textarea name="content" class="form-control" rows="15" required></textarea>
                </div>
                <!--<div>
                    <label for="color">Select Color:</label>
                    <input type="color" name="color" id="color" value="#FF0000">
                </div>-->
                <div class="color-palette">
                    <div class="color-option" style="background-color:#F2D7D5;"></div>
                    <div class="color-option" style="background-color: #F6DDCC;"></div>
                    <div class="color-option" style="background-color: #FDEBD0;"></div>
                    <div class="color-option" style="background-color: #D5F5E3;"></div>
                    <div class="color-option" style="background-color: #D4E6F1;"></div>
                    <div class="color-option" style="background-color: #E8DAEF;"></div>
                </div>
                <input type="hidden" name="color" id="selected_color" value="">

                <div class="form-group">
                    <label class="required-label">Due Date:</label>
                    <input type="date" name="due_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="required-label">Priority:</label>
                    <select name="priority" class="form-control" required>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="required-label">Category:</label>
                    <input type="text" name="category" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="required-label">Completion Status:</label>
                    <!-- Use proper name for completion_status -->
                    <select name="completion_status" class="form-control" required>
                        <option value="Incomplete">Incomplete</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                <script>
                    const colorOptions = document.querySelectorAll('.color-option');
                    const selectedColorInput = document.getElementById('selected_color');

                    colorOptions.forEach(option => {
                        option.addEventListener('click', function() {
                            const selectedColor = getComputedStyle(option).backgroundColor;

                            // Remove the 'selected-color' class from all options
                            colorOptions.forEach(opt => opt.classList.remove('selected-color'));

                            // Add the 'selected-color' class to the clicked option
                            option.classList.add('selected-color');

                            // Update the hidden input field with the selected color
                            selectedColorInput.value = selectedColor;

                            // Set the background color of the body
                            document.body.style.backgroundColor = selectedColor;
                        });
                    });

                    // Highlight the initially selected color option
                    colorOptions.forEach(option => {
                        if (selectedColorInput.value === getComputedStyle(option).backgroundColor) {
                            option.classList.add('selected-color');
                        }
                    });
                </script>
                <button type="submit" class="btn btn-outline-dark">Create</button>
            </form>
        </div>
    </div>
</body>

</html>