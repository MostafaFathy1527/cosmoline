<?php
include('config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmoline</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <img src="images/logo.png" alt="Cosmoline" class="img-responsive" height="50px">
            </div>
            <div class="menu  text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL;?>">Home</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL;?>categories.php">categories</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL;?>products.php">products</a>
                    </li>

                    <li>
                        <a href="#">login</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
