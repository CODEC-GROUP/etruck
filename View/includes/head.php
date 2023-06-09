
<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'active') :  else :
    echo "<script>window.location.replace('login.php')</script>";
endif ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>ExcelTutors Admin Panel</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- original -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">  -->
    <!-- copied -->
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">
   
    <!-- jauery -->

    <!-- original -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- copied -->
    <script src="assets/js/jquery.js"></script>

    

</head>