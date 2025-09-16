<?php
session_start();

$user_email = $_POST['email'];
$user_email = htmlspecialchars($user_email);
$user_password = $_POST['pass'];
