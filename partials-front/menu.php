<?php 
    include("config/constants.php"); 
    include("partials-front/login-check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="Navbar">
        <section class="title">
            <h2>
                AlphaBeta
            </h2>
        </section>
        <section class="menu text-right">
            <ul>
                <li>
                    <a href="<?php echo SITEURL; ?>index.php">Home</a>
                </li>
                <li>
                    <a href="#about">About</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL; ?>post.php">Post</a>
                </li>
                <li>
                    <a href="#news">News</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL; ?>logout.php">Log out</a>
                </li>
            </ul>
        </section>
    </section>
    <!-- Navbar Section Ends Here -->