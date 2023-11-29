# Appointment Booking System
This project is a simple appointment booking system using HTML, PHP, and SQL. The system allows users to submit their name, email, and preferred appointment date through a web form. The submitted data is then stored in a MySQL database using PHP.

## Requirements
To run this project, you will need the following software installed on your system:

A web server with PHP support (e.g., Apache, Nginx)
MySQL or MariaDB database server
phpMyAdmin or MySQL Workbench for database management
## Installation
Import the SQL file (initialize.sql) into your MySQL database using phpMyAdmin or MySQL Workbench. This will create the 'appointment' database and the 'appointments' table.

Edit the add_appointment.php file and replace the placeholders for the database credentials with your actual database credentials.

Configure your web server to serve the project files from the appropriate directory.

Access the HTML file through a web browser and test the appointment booking system by filling out the form and submitting it.

## Usage
The HTML file contains a web form for users to enter their name, email, and preferred appointment date. Once the form is submitted, the PHP script will connect to the MySQL database, insert the submitted data into the 'appointments' table, and display a confirmation message.

To view the appointments that have been booked, you can access the phpMyAdmin or MySQL Workbench and query the 'appointments' table.

## License
This project is licensed under the MIT License.
