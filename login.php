<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
if (isset($_SESSION['error'])){
    echo "error:" . $_SESSION['error'] . "has occurred";
}
?>

<div class="form-container">
    <form action="verify_login.php" method="post">
        <p class="email">Email:</p>
        <input type="email" required id="email" name="email" placeholder="example@email.com">

        <br>

        <p class="pass">Password:</p>
        <input type="password" required id="pass" name="pass" placeholder="..........">

        <br>

        <button type="submit" class="login-button">Log In</button>
    </form>
    <a href="https://bit.ly/nolinkneeded" target="_blank">Forgot Password</a>
</div>
</body>
</html>