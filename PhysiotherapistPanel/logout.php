<?php
session_start();
session_destroy();
header("Location: physiotherapist-home.php");
?>