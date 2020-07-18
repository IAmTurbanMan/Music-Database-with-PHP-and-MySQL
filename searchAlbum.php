<?php
require_once "header.php";

$conn = new mysqli ($hn,$un,$pw,$db);

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}

$artistID = $_GET['artistID'];
$_SESSION['artistID'] = $artistID;
$query = "select artistID,albumID,albumName from albums where artistID=$artistID";
$result = $conn->query($query);

if($result->num_rows)
{
    $rows = $result->num_rows;
    echo "<h1>Albums:</h1>";

    for($i=0;$i<$rows;$i++)
    {       
        $row = $result->fetch_array(MYSQL_NUM);
        echo "<li><a href='searchTrack.php?artistID=".$row[0]."&albumID=".$row[1]."'>".$row[2]."</a></li>";
    }
}

echo "<a href='addAlbum.php'>Add new album</a>";
$conn->close();
?>