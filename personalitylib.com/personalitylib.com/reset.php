<?php
// Start the session (if not already started)
session_start();

// Option 1: Unset all session variables
$_SESSION = array();

// Option 2: Destroy the session completely (including cookie)
// Use this option if you want to completely log the user out
session_destroy();