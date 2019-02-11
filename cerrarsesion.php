<?php 

session_start();
session_destroy();
header("Location: frontpage-bootstrap.html");

?>