<?php
// first start the session
session_start();

// unset all the session variables
session_unset();

// destroy the session
session_destroy();

// remove all cache and buffer
ob_clean();

// redirect user to main page
header("Location: /");

?>