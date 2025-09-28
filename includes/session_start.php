<?php
function session_start_if_none(){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}
session_start_if_none();