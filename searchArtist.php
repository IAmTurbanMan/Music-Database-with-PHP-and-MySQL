<?php
require_once "header.php";

$conn = new mysqli ($hn,$un,$pw,$db);

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}



if(isset($_SESSION['artistID']))
{
    $artistID = $_SESSION['artistID'];
    $query = "select * from artists where artistID='$artistID'";
    $result = $conn->query($query);

    if($result->num_rows)
    {
        $row = $result->fetch_assoc();
        header("Location:searchAlbum.php?artistID=$artistID");
    }
}

echo <<<_END
    <h1>Artist search</h1>
    <form action="searchArtist.php" method="post">
        <label for='artistSearch'>Artist:</label>
        <input type="text" name="artistSearch">
        <input type="submit" name="search" value="Search">
        <input type="submit" name="list" value="List Artists">
    </form>

_END;

if(isset($_POST['list']))
{
    unset($_POST['submit']);
    $query = "select * from artists";
    $result = $conn->query($query);

    if($result->num_rows)
    {  
        $rows = $result->num_rows;
        echo "<h2>Artists:</h2>";

        for($i=0;$i<$rows;$i++)
        {       
            $row = $result->fetch_array(MYSQL_NUM);
            echo "<li><a href='searchAlbum.php?artistID=".$row[0]."'>".$row[1]."</a></li>";
        }
    }

    else
    {
        echo "No results";
        die();
    }
    $conn->close();
}

elseif(isset($_POST['search']))
{
    unset($_POST['list']);
    $artistName = $_POST['artistSearch'];
    $query = "select * from artists where artistName='$artistName'";
    $result = $conn->query($query);

    if($result->num_rows)
    {
        $row = $result->fetch_assoc();
        header("Location:searchAlbum.php?artistID=".$row['artistID']."");
    }

    else
    {
        echo "No results";
        die();
    }
    $conn->close();
}

?>