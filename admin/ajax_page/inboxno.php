<?php 
        include("DatabaseFiles/cn.php");
        $r=mysql_query("select * from mail_to_tbl where mailto=".$_SESSION["lid"]." and isdelete=0");
        $r1=mysql_num_rows($r);
        echo $r1;
?>