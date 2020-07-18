<?php
require_once "header.php";

unset($_SESSION['artistID']);
unset($_SESSION['albumID']);

echo <<<_END
     <a href="addArtist.php">Add</a><br>
     <a href="searchArtist.php">Search</a>
_END;
?>