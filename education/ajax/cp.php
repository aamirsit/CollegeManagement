<?php
include("DatabaseFiles/cn.php");
if(isset($_REQUEST["pass"])){
$pass = $_REQUEST["pass"];
            $col=array('password');
            $val=array($_REQUEST['pass']);
            $db->update("student_tbl",'studid',$_SESSION["studid"], $col, $val);
            echo "1";
					
           }else{
           	echo "0";
           }

?>