<?php 
    include("DatabaseFiles/cn.php");
    $vr = $_REQUEST['del'];
    $table='mail_to_tbl';
    $pk='mtid';
    $col=array('isdelete');
    $val=array(1);
    $db->update($table,$pk,$vr,$col,$val);
    echo "deleted";
?>