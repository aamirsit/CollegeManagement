<?php 
    include("DatabaseFiles/cn.php");
    if($_REQUEST["mtid"]!=-1)
    {
        $vr = $_REQUEST['mtid'];
        $table='mail_to_tbl';
        $pk='mtid';
        $col=array('isdelete');
        $val=array(2);
        $db->update($table,$pk,$vr,$col,$val);
    }
    else
    {
        $vr = $_REQUEST['mfid'];
        $table='mail_from_tbl';
        $pk='mfid';
        $col=array('isdelete');
        $val=array(2);
        $db->update($table,$pk,$vr,$col,$val);
    }
?>