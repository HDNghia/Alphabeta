<?php
    //start session
    session_start();

    define('SITEURL', 'http://localhost:/alphabeta/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'alphabeta');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($c)); //Database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($s)); //Selecting Database
?>
