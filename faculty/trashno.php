    
<?php 
         include("DatabaseFiles/cn.php");
        $r=mysql_query("select * from mail_from_tbl where mailfrom=".$_SESSION["fid"]." and isdelete=1");
        $r1=mysql_num_rows($r);
        
        $rr=mysql_query("select * from mail_to_tbl where mailto=".$_SESSION["fid"]." and isdelete=1");
        $r1=$r1+mysql_num_rows($rr);
        echo $r1;
        
?>