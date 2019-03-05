<?php 
    include("DatabaseFiles/cn.php");
    $vr = $_REQUEST['del'];
    $table='mail_from_tbl';
    $pk='mfid';
    $col=array('isdelete');
    $val=array(1);
    $db->update($table,$pk,$vr,$col,$val);
    echo "deleted";
?>