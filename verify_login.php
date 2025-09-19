<?php
session_start();

$user_email = $_POST['email'];
$user_email = htmlspecialchars($user_email);
$user_password = $_POST['pass'];

$servername = 'localhost';
$sqlusername = 'root';
$sqlpassword = '';

$test_connection = new mysqli($servername , $sqlusername , $sqlpassword, 'login_tutorial' );
if ($test_connection->connect_error) {
    die("connection error". $test_connection->connect_error);
} else {
    echo "connected successfully";
}

$sql = $test_connection->prepare('SELECT * FROM users WHERE email = ?');
$sql->bind_param('s', $user_email);


$sql->execute();

$result = $sql->get_result();
$row = mysqli_fetch_row($result);
$hashed_password = $row[2];

