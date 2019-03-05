    
<?php 
         include("DatabaseFiles/cn.php");
        $r=mysql_query("select * from mail_from_tbl where mailfrom=".$_SESSION["fid"]." and isdraft=1 and isdelete=0");
        $r1=mysql_num_rows($r);
        echo $r1;?>