# ASB-19-20-109WebAssignment
i choosed option one to share my database which is Including Database Configuration in GitHub Repository.


This is a description of my project. It includes details about what the project does, how to use it, and how the database is used.

## Database

### Database Schema and Data
You can find the SQL dump file containing the database schema and sample data here: [Database Dump]([/path/to/database_dump.sql](https://github.com/KokilaHarshiniDeSilva/ASB-19-20-109WebAssignment/blob/main/assignment.sql)).

### Database Configuration
To configure the database connection, create a file named `config.php` in the `includes` directory with the following contents:

```php
<?php
$host = 'your_database_host';
$username = 'root';
$password = '';
$database = 'assignment';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
