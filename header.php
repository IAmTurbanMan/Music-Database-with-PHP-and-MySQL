<?php
session_start();
require_once "dbconfig.php";

echo <<<_END
<!DOCTYPE html>
<html>
<head>
<title>Music Database</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="https://fonts.googleapis.com/css?family=Beth+Ellen&display=swap" rel="stylesheet">
</head>
<body>
<div id="container">
<ul id="menu">
    <li><a href="home.php">Home</a></li>
    <li><a href="addArtist.php">Add</a></li>
    <li><a href="searchArtist.php">Search</a></li>
</ul>
</body>
_END
?>