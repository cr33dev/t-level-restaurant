

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

<?php
if (isset($_SESSION['error'])){
    echo "error:" . $_SESSION['error'] . "has occurred";
}
?>


<form action="verify_login.php" method="post">
    <label for="#email">Email: </label>
    <input type="email" required id="email" placeholder="example@email.com">

    <label for="#pass">Password: </label>
    <input type="password" required id="pass" placeholder=".......">
    <button type="submit">Log In</button>
</form>

<a href="https://bit.ly/nolinkneeded" target="_blank">Forgot Password</a>
</body>
</html>
