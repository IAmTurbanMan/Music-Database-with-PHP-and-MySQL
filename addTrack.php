<?php
require_once "header.php";

$conn = new mysqli ($hn,$un,$pw,$db);

if($conn->connect_error)
{
    die("Connection failed: ".$connection->connect_error);
}

echo <<<_END
    <h1>Add track</h1>
    <form action="addTrack.php" method="post">
        <label for='track'>Track Name:</label>
        <input type='text' name='track'><br>
        <label for='trackNum'>Track Number:</label>
        <input type='text' name='trackNum'><br>
        <label for='runtime'>Runtime:</label>
        <input type='text' name='runtime'><br>
        <label for='lyrics'>URL for lyrics:</label>
        <input type='text' name='lyrics'><br>
        <input type='submit' name='add' value='Add'>
    </form>
_END;

if(isset($_POST['add']))
{
    $artistID = $_SESSION['artistID'];
    $albumID = $_SESSION['albumID'];
    $track = $_POST['track'];
    $trackNum = $_POST['trackNum'];
    $runtime = $_POST['runtime'];
    $lyrics = $_POST['lyrics'];
    $query = "insert into tracks(albumID,artistID,trackNum,trackName,runtime,lyricsURL) values('$albumID','$artistID','$trackNum','$track','$runtime','$lyrics')";
    $conn->query($query);
    echo <<<_END
    <a href ="searchTrack.php?albumID=$albumID">Done</a>
_END;

}


?>