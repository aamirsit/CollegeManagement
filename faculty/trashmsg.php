<?php 
    include("DatabaseFiles/cn.php");
    $r=mysql_fetch_object(mysql_query("select * from mail_from_tbl where mfid=".$_REQUEST["mfid"]));
    $f=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$r->mailfrom));
?>
<input type="hidden" value="<?php if(isset($_REQUEST['mtid'])){ echo $_REQUEST['mtid'];}?>" id='hid1'>
<input type="hidden" value="<?= $_REQUEST["mfid"]?>" id='hid'>
<div class="block full">
<div class="block-title">
<div class="block-options">
<div class="btn-group btn-group-sm">
<a href="javascript:void(0)" id="back" class="btn btn-primary" data-toggle="tooltip" title="Back"><i class="icon-reply"></i></a>
</div>
<div class="btn-group btn-group-sm">
<input type="hidden" class="mtid" value="<?php if(isset($_REQUEST['mtid'])){ echo $_REQUEST['mtid'];}?>" >
<a href="javascript:void(0)" id="<?= $_REQUEST["mfid"]?>" class="btn btn-primary send" data-toggle="tooltip" title="Restore"><i class="icon-undo"></i></a>
</div>
<div class="btn-group btn-group-sm">
<a href="javascript:void(0)"  id="delete" class="btn btn-primary" data-toggle='tooltip' title='Delete'><i class="icon-trash"></i></a>
</div>
</div>
</div>
<div class="ms-message">
<div class="clearfix">
<img src="uploadimage/<?= $f->photo?>" width="100" height="100" alt="avatar" class="img-circle pull-right">
<h3>From : <?= $f->fname." ".$f->lname;?></h3>
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
           if(confirm('Are you sure?'))
               {
           var mfid = $('#hid').val();
           var u = $('#hid1').val();
           if(u != "")
            {
                mtid = u;
            }
           else
               mtid = -1;
          $.ajax({
             type: "POST",
             url: "trashdel.php",
             data: {mfid:mfid , mtid:mtid},
             success: function(data){
                 $('#open').load('trash.php');
                 $('.deleted').css({'left':'80%','visibility':'visible'});
                 setTimeout(function(){
                 $('.deleted').css({'left':'92.5%','visibility':'hidden'});
                 },2000);
             }
          }); 
               }
       }); 
       $('.send').click(function(){
           var d = $(this).attr('id');
                var mfid = d;
           var u = $('.mtid').val();
           if(u != "")
            {
                mtid = u;
            }
           else
               mtid = -1;
            $.ajax({
             type: "POST",
             url: "trashupd.php",
             data: {mfid:mfid , mtid:mtid},
             success: function(data){
                 $('#open').load('trash.php');
             }
          });  
       });
       $('#back').click(function(){
           $('#open').load('trash.php');
       });    
        
    });
</script>