<?php

include 'connect.php';

session_start();
// free all session variables
session_unset();
// end the the session
session_destroy();

header('location:../php/admin_login.php');

?>