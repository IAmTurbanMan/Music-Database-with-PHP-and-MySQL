<?php
require_once "header.php";

$conn = new mysqli ($hn,$un,$pw,$db);

if($conn->connect_error)
{
    die("Connection failed: ".$connection->connect_error);
}

$_SESSION['albumID'] = $_GET['albumID'];

if(isset($_SESSION['albumID']))
{
    $albumID = $_SESSION['albumID'];
    $trackQuery = "select trackNum,trackName,runtime,lyricsURL from tracks where albumID='$albumID' order by trackNum";
    $albumQuery = "select artistName,albumName,genre,releaseYear,albumArt from albums join artists on albums.artistID=artists.artistID where albumID='$albumID'";
    $trackResult = $conn->query($trackQuery);
    $albumResult = $conn->query($albumQuery);

    if($albumResult->num_rows)
    {
        $albumRow = $albumResult->fetch_assoc();
        echo "<b>Artist</b>: ".$albumRow['artistName']."<br><b>Album</b>: ".$albumRow['albumName']."<br><b>Release Year</b>: ".$albumRow['releaseYear']."<br><b>Genre</b>: ".$albumRow['genre']."<br>";
        echo "<img src='".$albumRow['albumArt']."' height ='128' width = '128'>";
    }

    if($trackResult->num_rows)
    {   
        echo "<table><tr><th>Track Number</th><th>Name</th><th>Runtime</th></tr>";
        $rows = $trackResult->num_rows;
        for($i=0;$i<$rows;$i++)
        {       
            $row = $trackResult->fetch_assoc();
            echo "<tr><td>".$row['trackNum']."</td><td><a href='".$row['lyricsURL']."' target='_blank'>".$row['trackName']."</a></td><td>".$row['runtime']."</td></tr>";
        }
        echo "</table>";
    }

    else
    {
        header("Location:addTrack.php");
    }

    echo "<a href='home.php'>Done</a>";
}
?>