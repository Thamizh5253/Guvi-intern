<?php
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Respond with a success message
echo json_encode(array("success" => true));
?>
