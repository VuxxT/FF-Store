<?php

// remove all session variables
session_unset();

// destroy the session
session_destroy();
exit(header("Location: $baseUrl?p=home"));

?>