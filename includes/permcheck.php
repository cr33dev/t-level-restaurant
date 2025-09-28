<?php

include __DIR__ . "/session_start.php";

if (!isset($_SESSION['username'])) {
    include __DIR__ . "/session_end.php";
    exit();
}
if (!isset($_SESSION['permitted']) or $_SESSION('permitted') !== true) {
    include __DIR__ . "/session_end.php";
    exit();
}