<style type="text/css">
    li:hover{
        filter:contrast(90%);
    }
     #myInput{
        padding: 8px 12px;
        margin: 0 0 3px 47%;
        width: 300px;
    }
</style>
<div class="block full">
<div class="block-title">
<h2>Trash Messages</h2><input id="myInput" type="text" placeholder="Search.."/>
    </div>
<div class="ms-message-list list-group">
    <form method="post">
        
<div id="fx-container" class="fx-opacity">
    <div id="page-content" class="block">
	   <div class="block-header">
    <link rel="stylesheet" href="css/chat.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" >
                <div class="panel panel-default">

                <div class="panel-collapse" id="collapseOne">
                    <div class="panel-body">
                    <ul class="timeline" style="max-height:300px;min-height:70px;">
                        <?php 
                                    include("DatabaseFiles/cn.php");
                                    $r=mysql_query("select * from mail_from_tbl where mailfrom=".$_SESSION['fid']." AND isdelete=1 order by mfid DESC");
                                    while($r1=mysql_fetch_object($r))
                                    {
                                        $frm=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$r1->mailfrom));
                                    ?>
                                       <li class=""><a id="<?= $r1->mfid?>" class="link" style="cursor:pointer;">
                                           <div class="timeline-item" style="width:100%;">
                                               <h4 class="timeline-title"><small class="timeline-meta"><?=$r1->maildate?></small>From : Me</h4>
                                               <div class="timeline-content"><b style="color:black;">Description :</b><strong style="font-weight:400;color:black;line-height:25px;"><?php $des=substr("$r1->description",0,125); echo "<br>".$des."....";?><i style="font-weight:400;color:orange;">Read More</i></strong></div>
                                            </div></a>
                                        </li>
                                    <?php } $one=mysql_num_rows($r);
                        
                                    $r=mysql_query("select mt.*,mf.* from mail_to_tbl mt inner join mail_from_tbl mf where mt.mfid=mf.mfid and  mt.mailto=".$_SESSION['fid']." AND mt.isdelete=1 order by mt.mtid DESC");
                                    while($r1=mysql_fetch_object($r))
                                    {
                                        $frm=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$r1->mailfrom));
                                    ?>
                                       <li class=""><a id="<?= $r1->mtid?>:<?= $r1->mfid?>" class="llink" style="cursor:pointer;">
                                           <div class="timeline-item" style="width:100%;">
                                               <h4 class="timeline-title"><small class="timeline-meta"><?=$r1->maildate?></small>From : <?= $frm->fname." ".$frm->lname?></h4>
                                               <div class="timeline-content"><b style="color:black;">Description :</b><strong style="font-weight:400;color:black;line-height:25px;"><?php $des=substr("$r1->description",0,125); echo "<br>".$des."....";?><i style="font-weight:400;color:orange;">Read More</i></strong></div>
                                            </div></a>
                                        </li>
                                    <?php } if(empty(mysql_num_rows($r)) && $one==""){echo "<center><h1 style='margin-top:15%;'><i class='icon-trash' style='font-size:100px;'></i><br>No Trash here<br>Thanks For Recycling!</h1></center>";}
                                ?>
                  </ul>
                    </div>  
            </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
</div>
</form>
</div>
<script>
    $(document).ready(function(){
      $('.draft').load('draftno.php');
       $('.inbox').load('inboxno.php');
       $('.inbox1').load('inboxno.php');
       $('.sent').load('sentno.php');
       $('.trash').load('trashno.php');
        $(".link").click(function(){
            var d = $(this).attr('id');
            var mfid = d;
            $("#open").load('trashmsg.php?mfid='+mfid);
        });
        $(".llink").click(function(){
            var d = $(this).attr('id');
             var u = d.split(':');
            var mtid = u[0];
            var mfid = u[1];
            $("#open").load('trashmsg.php?mtid='+mtid+'&mfid='+mfid);
        });
        
        
    });
</script>