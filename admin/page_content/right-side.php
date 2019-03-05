<div id="sidebar-right">
  <div class="sidebar-content">
    <div class="user-info">
      <?php $li=$_SESSION["lid"]; $r=mysql_query('select * from faculty_tbl where fid='.$li); $r1=mysql_fetch_object($r); ?>
      <div class="user-details"><a href="page_special_user_profile.html"><?= $r1->fname?></a><br>
        <em>Web Designer</em></div>
      <img class="img-circle" src="../faculty/uploadimage/<?= $r1->photo?>" width="40" height="40" alt="Avatar"> </div>
    <div class="sidebar-right-scroll">
      <ul class="sidebar-nav">
        <li>
          <h2 class="sidebar-header">Explore</h2>
        </li>
        <li> <a href="edit_profile.php"><i class="icon-edit-sign"></i> Profile</a> </li>
        <li> <a <?php if($n=="11"){echo 'class="active"';} ?> href="cp.php"><i class="halfling-retweet"></i>Change Password</a></li>
        <li> <a href="#" data-toggle="modal" data-target="#exampleModalCenter12" ><i class="icon-off"></i>Logout</a></li>
      </ul>
      <div class="sidebar-section" id="right">
        <h2 class="sidebar-header">MESSAGES</h2>
       <?php $r=mysql_query("select mf.*,mt.* from mail_to_tbl mt inner join mail_from_tbl mf where mt.mfid=mf.mfid AND 
        mt.mailto=".$_SESSION["lid"]." AND mt.isread=0 AND mt.isdelete=0 ");
            while($r1=mysql_fetch_object($r)){
          ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <small><em><?= $r1->maildate?></em></small><br>
          <?php $des=substr("$r1->description",0,30); echo "<br>".$des."....";?><a href="message_center.php">View more</a></div>
          <?php }?>
      </div>
    </div>
  </div>
</div>