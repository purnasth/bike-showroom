<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $bike = $_POST['bike'];
  $date = $_POST['date'];
  $time = $_POST['time'];

  if (empty($name) || empty($email) || empty($phone) || empty($bike) || empty($date) || empty($time)) {
    echo 'Please fill in all required fields.';
  } else {
    // Send email (you can replace this with database insertion or any other action)
    $to = 'you@example.com'; // Replace with your email address
    $subject = 'New appointment request';
    $message = "Name: $name\nEmail: $email\nPhone: $phone\nBike Model: $bike\nDate: $date\nTime: $time";
    $headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";
    if (mail($to, $subject, $message, $headers)) {
      echo 'Your appointment request has been submitted successfully!';
    } else {
      echo 'An error occurred while submitting your appointment request. Please try again later.';
    }
  }
}
