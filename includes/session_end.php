<?php
function end_session() {
    if (session_status() == PHP_SESSION_ACTIVE) {
        var_dump($_SESSION);
        var_dump($_POST);
        if (isset($sqliconfig)) {
            var_dump($sqliconfig);
        }
        session_destroy();
        header('Location: login.php');
        exit();
    }
}
end_session();