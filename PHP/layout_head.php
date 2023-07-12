<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- set the page title, for seo purposes too -->
    <title><?php echo isset($page_title) ? strip_tags($page_title) : "Homepage"; ?></title>
 
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />
 
    <!-- admin custom CSS -->
    <link href="<?php echo $home_url . "css/website.css" ?>" rel="stylesheet" type="text/css" />
 
</head>
<body style="background-color:#E8E8E8;">
 
    <!-- include the navigation bar -->
    <?php include_once 'navigation.php'; ?>
    <?php include_once 'config/connect_database.php'; ?>
 
    <!-- container -->
    <div class="container" style="margin:auto;">
