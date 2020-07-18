<?php
require_once "header.php";

$conn = new mysqli ($hn,$un,$pw,$db);

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}

echo <<<_END
    <h1>Add Album</h1>
    <form action="addAlbum.php" method="post">
        <label for='album'>Album Name:</label>
        <input type='text' name='album'><br>
        <label for='release'>Release year:</label>
        <input type='text' name='release'><br>
        <label for='genre'>Genre:</label>
        <input type='text' name='genre'><br>
        <label for='art'>URL for album art:</label>
        <input type='text' name='art'><br>
        <input type='submit' name='add' value='Add'>
    </form>

_END;

if(isset($_POST['add']))
{
    $artistID = $_SESSION['artistID'];
    $album = $_POST['album'];
    $release = $_POST['release'];
    $genre = $_POST['genre'];
    $art = $_POST['art'];
    $query = "insert into albums(artistID,albumName,releaseYear,genre,albumArt) values('$artistID','$album','$release','$genre','$art')";
    $conn->query($query);
    $albumIDQuery = "select albumID from albums where albumName='$album'";
    $result = $conn->query($albumIDQuery);
    $row = $result->fetch_assoc();
    $_SESSION['albumID'] = $row['albumID'];
    header("Location:addTrack.php");
}

?>