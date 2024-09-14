<?php
    require_once("includes/config.php");
    require_once("includes/classes/PreviewProvider.php");
    require_once("includes/classes/Entity.php");
    require_once("includes/classes/CategoryContainers.php");
    require_once("includes/classes/EntityProvider.php");
    require_once("includes/classes/ErrorMsg.php");
    require_once("includes/classes/SeasonProvider.php");
    require_once("includes/classes/Season.php");
    require_once("includes/classes/Video.php");


    if(!isset($_SESSION["userLoggedIn"])){
        header("Location: login.php");
    }

    $userLoggedIn = $_SESSION["userLoggedIn"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NiggaFlix</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/adc135e321.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="wrapper">
        
