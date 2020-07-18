<?php

class Music
{
    function print_message($details,$color="green",$timer="0",$pagename="",$url="")
    {
        $timer2 = $timer*1000;

        switch($color)
        {
            case "red":
            echo <<<_END
    
            <div class="error">
                <h4>ERROR!</h4>
_END;
            break;
            case "yellow":
            echo <<<_END
    
            <div class="warning">
                <h4>WARNING!</h4>
_END;
            break;
    
            case "green";
            default:
            echo <<<_END
    
            <div class="message">
                <h4>YEE-HAW!</h4>
_END;
            break;
        }
        
        echo <<<_END
    
                <p>$details</p>
_END;
    
        if($timer)
        {
            echo <<<_END
    
            <p>Redirecting you to <a href="$url">$pagename</a> in $timer seconds.</p>
            </div>
            <script type="text/JavaScript">
                setTimeout("window.location.href = '$url';",$timer2);
            </script>
_END;
        }
        else
        {
            echo <<<_END
    
            </div>
_END;
        }
    }
}    
?>