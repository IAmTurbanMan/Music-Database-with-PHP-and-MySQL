<?php
require_once "header.php";

echo <<< _END
            <h3>Your music</h3>

_END;

    $connection = new mysqli ($hn,$un,$pw,$db);
    if($connection->connect_error)
    {
        die("Connection failed: ".$connection->connect_error);
    }
    
    $musicQuery = "select trackNum,trackName,runtime,lyricsURL from tracks order by trackNum";
    $albumQuery = "select artistName,albumName,genre,albumArt from albums natural join artists";
    $result = $connection->query($musicQuery);
    $albumResult = $connection->query($albumQuery);
    #if(!$result)
    #{
    #    print_message("Fatal Error!");
    #    die();
    #}
    if($albumResult->num_rows > 0)
    {
        $albumRow = $albumResult->fetch_array(MYSQL_NUM);
        echo "Artist: ".$albumRow[0]."<br>Album: ".$albumRow[1]."<br>Genre: ".$albumRow[2]."<br>";
        echo "<img src='".$albumRow[3]."' height ='128' width = '128'>";
    }
    if($result->num_rows > 0)
    {
       
        echo "<table><tr><th>Track Number</th><th>Name</th><th>Runtime</th></tr>";
        $rows = $result->num_rows;
        for($i=0;$i<$rows;$i++)
        {       
            $row = $result->fetch_array(MYSQL_NUM);
            echo "<tr><td>".$row[0]."</td><td><a href='".$row[3]."' target='_blank'>".$row[1]."</a></td><td>".$row[2]."</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "No results!";
    }
    #$result->close();
    $connection->close();
    ?>