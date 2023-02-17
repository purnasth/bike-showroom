<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "database_name";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $bike = mysqli_real_escape_string($conn, $_POST["bike"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $time = mysqli_real_escape_string($conn, $_POST["time"]);

    $sql = "INSERT INTO appointments (name, email, phone, bike, date, time)
            VALUES ('$name', '$email', '$phone', '$bike', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
