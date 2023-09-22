<?php /* Template Name: Logout Page*/ ?>
<?php
// Start the session
session_start();

// Check if the admin session variable is set to true
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

    // Clear the session variables
    $_SESSION = array();
    session_destroy();

    // Redirect to the homepage
    header('Location: /'); // Replace "/" with the actual URL of your homepage
    exit();
}
