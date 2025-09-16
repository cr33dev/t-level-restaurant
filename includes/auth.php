<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/config.php';

function start_session_if_needed()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function is_logged_in()
{
    start_session_if_needed();
    return isset($_SESSION['user_id']);
}

function current_user_email()
{
    start_session_if_needed();
    return $_SESSION['user_email'];
}

function login_user($user_id, $email)
{
    start_session_if_needed();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_email'] = $email;
}

function logout_user()
{
    start_session_if_needed();
    unset($_SESSION['user_id'], $_SESSION['user_email']);
}

function set_flash($message)
{
    start_session_if_needed();
    $_SESSION['flash_message'] = $message;
}

function pop_flash()
{
    start_session_if_needed();
    if (isset($_SESSION['flash_message'])) {
        $msg = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        return $msg;
    }
    return null;
}

function get_flash_msg()
{
    start_session_if_needed();
    return $_SESSION['flash_message'] ?? null;
}

function render_flash_alert_if_any()
{
    $msg = pop_flash();
    if ($msg != null) {
        $safe = json_encode($msg, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
        echo "<script>window.addEventListener('DOMContentLoaded', function () {alert($safe)});</script>})";
    }
}

function require_login()
{
    global $BASE_URL;
    if (!is_logged_in()) {
        set_flash("You must be logged in to access that page.");
        header("Location: " . $BASE_URL . "/login.php");
        exit;
    }
}

