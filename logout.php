<?php
require 'inc/functions.php';
session_start();
session_unset();
session_destroy();
header("location:account");

?>