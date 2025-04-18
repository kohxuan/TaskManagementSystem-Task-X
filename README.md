# 📝 Task Management System

The **Task Management System** is a web-based application designed to allow users to efficiently create, customize, and manage tasks. This project leverages PHP, MySQL, and Bootstrap to provide a user-friendly interface for task management.
<br><br>

### ✨ Features
- **User Registration and Authentication**: Secure registration and login system with password hashing.
- **Task Dashboard**: Central hub for managing tasks with options to create, view, edit, delete, export, and import tasks.
- **Task Creation and Editing**: Input and update task details such as title, content, due date, priority, category, and completion status.
- **Task Viewing**: Display tasks with color-coded backgrounds and truncated content for easy readability.
- **Task Deletion**: Remove tasks with confirmation alerts to ensure intentional actions.
- **Task Export and Import**: Export tasks to a CSV file for sharing and backup, and import tasks from a CSV file for bulk management.
- **Interactive Calendar**: View tasks in a calendar format for better planning and organization.
- **Data Filtering**: Filter tasks by priority, category, and completion status for easy management.
- **Responsive Design**: Utilizes Bootstrap for a responsive and modern design, ensuring usability across devices.
<br>

### 🎥 Demo Video
Watch the demo video [here](https://youtu.be/zvhwLsuoxTA).
<p align="center">
    <a href="https://youtu.be/zvhwLsuoxTA">
        <img src="https://github.com/user-attachments/assets/00b65cc3-85be-4e53-938a-c1c3fa93ef9c" alt="Watch the video" width="400"/>
    </a>
</p>
<br>

### 🛠️ Technical Overview
- **PHP**: Handles server-side operations, form submissions, and database interactions.
- **MySQL**: Securely stores task data with user-specific management.
- **Bootstrap**: Provides a responsive and visually appealing interface.
- **JavaScript/jQuery**: Manages dynamic UI updates and data filtering.
<br>

### 📁 File Structure
- **calendar_view.php**: Displays tasks in a calendar format.
- **create_form.php**: Form for creating new tasks with customizable options.
- **create_process.php**: Processes form submissions and stores task data in the database.
- **db_1.php**: Database connection file, establishing a connection to the MySQL database.
- **delete.php**: Handles task deletion, providing feedback to the user.
- **export.php**: Exports user tasks to a CSV file for download.
- **import.php**: Imports tasks from a CSV file, allowing for bulk task management.
- **index.php**: Main dashboard for managing tasks, with options for filtering and navigation.
- **login.php**: User login page with options to register.
- **login_process.php**: Processes login requests and authenticates users.
- **logout.php**: Logs out users and destroys session data.
- **read.php**: Fetches and displays tasks for the current user.
- **register.php**: User registration page for creating new accounts.
- **register_process.php**: Processes registration requests, checks for existing usernames, and stores new user data.
- **task_management.sql**: SQL file for setting up the database schema and initial data.
- **update_form.php**: Form for editing existing tasks, allowing updates to all task details.
- **update_process.php**: Processes updates to existing tasks, ensuring secure data handling.
<br>

### 🚀 Getting Started
1. **Database Setup**: Import `task_management.sql` into your MySQL database to set up the necessary tables and initial data.
2. **Configure Database Connection**: Update `db_1.php` with your database credentials if they differ from the defaults.
3. **Access the Registration Page**: Open `register.php` in a web browser to create a new account.
4. **Access the Login Page**: Open `login.php` in a web browser to log in or register.
5. **Manage Tasks**: Use the application to create, view, edit, delete, export, and import tasks as needed.
<br>
