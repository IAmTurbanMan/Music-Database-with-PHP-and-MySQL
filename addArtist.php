<?php
require_once "header.php";

$conn = new mysqli ($hn,$un,$pw,$db);

if($conn->connect_error)
{
    die("Connection failed: ".$connection->connect_error);
}

echo <<<_END
    <h1>Add Artist</h1>
    <form action="addArtist.php" method="post">
        <label for='Artist'>Artist:</label>
        <input type='text' name='artistToAdd' id='artist'>
        <input type='submit' name='add' value='Add'>
    </form>

_END;


if (isset($_POST['add']))
    {
        $artist= $_POST['artistToAdd'];
        $checkDuplicate = "select * from artists where artistName='$artist'";
        $result = $conn->query($checkDuplicate);

        if (!$result)
        {
            die("Connection failed: ".$connection->connect_error);
        }

        elseif ($result->num_rows)
        {
            $row = $result->fetch_assoc();
            $_SESSION['artistID']=$row['artistID'];
            $artistID = $_SESSION['artistID'];
            echo "Looks like this artist already exists in this database.<br>Moving on to album search in 5 seconds.<br>";
            header("Location:searchAlbum.php?artistID=$artistID");
        }

        else
        {
            $addQuery = "insert into artists(artistName) values('$artist')";
            $result = $conn->query($addQuery);
            echo "$artist has been added to the database<br>Moving on to album add in 5 seconds.<br>";
            $artistIDQuery = "select artistID from artists where artistName='$artist'";
            $result = $conn->query($artistIDQuery);
            $row = $result->fetch_assoc();
            $_SESSION['artistID']=$row['artistID'];
            header("Location:addAlbum.php");
        }
    }
?>