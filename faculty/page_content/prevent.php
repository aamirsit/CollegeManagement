<?php 
    if(!isset($_SESSION["fid"]))
    {
        echo "<script type='text/javascript'>
        function preventBack() {
            window.history.forward();
        }
        setTimeout('preventBack()',0);location.href='logout.php'</script>";
    }
?>