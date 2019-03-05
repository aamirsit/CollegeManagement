<?php
	include("DatabaseFiles/cn.php");
	$fid = $_POST["fid"];
	$r=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$fid));
    $r1=mysql_fetch_object(mysql_query("select * from  faculty_sem_tbl where fid=".$fid." AND year='".$_SESSION["year"]."'"));
	echo $r->fid.":".$r->fname.":".$r->lname.":".$r->gender.":".$r->dob.":".$r->doj.":".$r->photo.":";
    if($r1)
    {
        echo $r1->sem;    
    }
    else
    {
        echo "No";
    }
    
?>