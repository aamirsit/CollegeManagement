<?php include("DatabaseFiles/cn.php");
    $r=mysql_fetch_object(mysql_query("select * from mail_from_tbl where mfid=".$_REQUEST["mfid"]));
    $f=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$r->mailfrom));
?>
<input type="hidden" value="<?= $_REQUEST['mfid']?>" id='hid'>
<div class="block full">
<div class="block-title">
<div class="block-options">
<div class="btn-group btn-group-sm">
<a href="javascript:void(0)" id="back" class="btn btn-primary" data-toggle="tooltip" title="Back"><i class="icon-reply"></i></a>
</div>
<div class="btn-group btn-group-sm">
<a href="javascript:void(0)" id="delete" class="btn btn-primary" data-toggle='tooltip' title='Delete'><i class="icon-trash"></i></a>
</div>
</div>
</div>
<div class="ms-message">
<div class="clearfix">
<img src="../faculty/uploadimage/<?= $f->photo?>" width="100" height="100" alt="avatar" class="img-circle pull-right">
<h3>From : Me<br>To : <?php
        
        $to=mysql_query("select f.* from faculty_tbl f inner join mail_to_tbl mt where f.fid=mt.mailto AND mt.mfid=".$_REQUEST["mfid"]);
        while($to1=mysql_fetch_object($to))
        {echo $to1->fname." ".$to1->lname.",";}
    ?></h3>
<br><small><em><?= $r->maildate?></em></small>
</div>
<div class="ms-message-content">
<h3><?=$r->subject?></h3><br>
<p><?= $r->description?></p>
</div>
</div>
<script>
    $(document).ready(function(){
       $("#delete").click(function(){
           var id = $('#hid').val();
          $.ajax({
             type: "POST",
             url: "ajax_page/sentdel.php",
             data: {del:id},
             success: function(data){
                 $('#open').load('ajax_page/sent.php');
                 $('.deleted').css({'left':'80%','visibility':'visible'});
                 setTimeout(function(){
                 $('.deleted').css({'left':'92.5%','visibility':'hidden'});
                 },2000);
             }
          }); 
       }); 
        $('#back').click(function(){
           $('#open').load('ajax_page/sent.php');
       });
    });
</script>