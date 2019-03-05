<div id="sidebar-right">
  <div class="sidebar-content">
    <div class="user-info">
      <div class="user-details"><a href="index.php">Faculty</a><br>
        <em><?php  
                $r=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$_SESSION["fid"]));
                echo $r->fname." ".$r->lname;
            ?></em></div>
      <img src="uploadimage/<?= $r->photo?>" width="40" height="40" class="img-circle" > </div>
    <div class="sidebar-right-scroll">
      <ul class="sidebar-nav">
        <li>
          <h2 class="sidebar-header">Profile</h2>
        </li>
        <li> <a href="edit_profile.php"><i class="icon-edit-sign"></i>Edit Profile</a> </li>
        <li> <a href="change_password.php"><i class="icon-envelope-alt"></i>Change Password</a> </li>
        <li class="text-center">
              <h2 class="sidebar-header"><i class="glyphicon-record "> </i><i class="glyphicon-record "> </i><i class="glyphicon-record "> </i></h2>
        </li>
          <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter12" ><i class="icon-off"></i>Logout</a></li>
      </ul>
     <div class="sidebar-section" id="right">
        <h2 class="sidebar-header">MESSAGES</h2>
       <?php 
        $r=mysql_query("select mf.*,mt.* from mail_to_tbl mt inner join mail_from_tbl mf where mt.mfid=mf.mfid AND 
        mt.mailto=".$_SESSION['fid']." AND mt.isread=0 AND mt.isdelete=0 ");
            while($r1=mysql_fetch_object($r)){
          ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <small><em><?= $r1->maildate?></em></small><br>
          <?php echo "New Message...<br>"?><a href="message_center.php">View Message</a></div>
          <?php }?>
      </div>
    </div>
  </div>
</div>