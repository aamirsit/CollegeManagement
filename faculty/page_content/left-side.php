<?php 
    if(isset($_REQUEST["sbtn1"]))
    {
        $min=$_REQUEST["min"];
        $max=$_REQUEST["max"];
        $studid=$_REQUEST["roll"];
        echo "<script>location.href='attendence_stud_list.php?studid=$studid&min=$min&max=$max'</script>";
    }
error_reporting(0);
?>
<style type="text/css">
    .logout{
        width:100%;
        height:35px;
        background-color:transparent;
        border: none;
        outline:none;
        top:-35px;
        position:relative;
    }
    .logout:hover{
        background-color: rgba(333,333,333,0.1);
    }
</style>
 <div id="sidebar-left" class="enable-hover">
  <div class="sidebar-content">
    <form action="page_ready_search_results.html" method="post" class="sidebar-search"><img src="img/iqra.svg" width="45" height="auto" alt="">
      IQRA BCA COLLEGE
    </form>
    <div class="sidebar-left-scroll">
      <ul class="sidebar-nav">
        <li>
          <h2 class="sidebar-header">Welcome</h2>
        </li>
        <li> <a href="index.php" class=" active"><i class="icon-coffee"></i>Dashboard</a> </li>
          <?php  include("DatabaseFiles/cn.php");
                $flag=0;
              $d=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' group by sem");
              while($d1=mysql_fetch_object($d))
              { if($d1->sem!=null && $d1->sem%2==0){
              $flag++;
              }}
              if($flag!=0)
              {
                $s=mysql_query("select * from subject_tbl where sem%2=0 AND fid=".$_SESSION["fid"]." group by sem");
              }else
              {
                $s=mysql_query("select * from subject_tbl where sem%2!=0 AND fid=".$_SESSION["fid"]." group by sem"); 
              }
                $s2=mysql_fetch_object($s);
                if($s2)
                {?>
               <li>
                  <h2 class="sidebar-header"> Marks</h2>
               </li> 
            <?php 
                if($flag!=0)
                {
                    $s=mysql_query("select * from subject_tbl where sem%2=0 AND fid=".$_SESSION["fid"]." group by sem");
                }
                else
                {
                    $s=mysql_query("select * from subject_tbl where sem%2!=0 AND fid=".$_SESSION["fid"]." group by sem");    
                }
                        
                while($s1=mysql_fetch_object($s))
                 { 
            ?>   <li><a href="#" class="menu-link"><i class="icon-book"></i>SEM <?= $s1->sem?></a>
                 <ul><?php 
                       $r=mysql_query("select * from subject_tbl where fid=".$_SESSION["fid"]." AND sem=".$s1->sem);
                        while($r1=mysql_fetch_object($r))
                        {
                     ?>
                  <li><a href='exam_subject_form.php?subid=<?= $r1->subid?>'><?= $r1->sname?></a></li><?php }?></ul></li>
                <?php }?>
                 <li><a href='practical.php'><i class="icon-desktop"></i>Practical</a></li>
           <li> <a href='#' class="menu-link"><i class="glyphicon-eye_open"></i>View Marks</a>
            <ul>
               <?php if($_SESSION["sem"]!=""){?>
                    <li> <a href='exam_report_list.php' class=""><i class="glyphicon-eye_open"></i>SEM <?= $_SESSION["sem"]?> Marks</a></li>
                <li> <a href='internal_30.php' class=""><i class="glyphicon-eye_open"></i>Internal(30)</a></li><?php }?>
                <li> <a href='my_subject_marks.php' class=""><i class="glyphicon-eye_open"></i>My Subject Marks</a></li>
            </ul>
          </li>  
            <?php } if($_SESSION["sem"]!=""){?>  
             <li>
                  <h2 class="sidebar-header">Attendance</h2>
             </li>
            <?php 
                $r=mysql_query("select faculty_sem_tbl.* from login_tbl inner join faculty_sem_tbl where login_tbl.fid=faculty_sem_tbl.fid AND faculty_sem_tbl.sem=".$_SESSION["sem"]." AND faculty_sem_tbl.year='".$_SESSION["year"]."'");
                while($r1=mysql_fetch_object($r))
                {
            ?>
          <li> <a href="attendence_form.php"><i class="icon-th"></i>SEM<?= $r1->sem?></a></li>
         <?php }if($_SESSION["sem"]!=6){?>
        <h2 class="sidebar-header">Students</h2>
          <li> <a href="next_sem_form.php"><i class="glyphicon-disk_export"></i>Upgrade Sem</a></li>
          <li> <a href='#' class="menu-link"><i class="glyphicon-eye_open"></i>View Students</a>
            <ul>
              <li> <a href="student_list.php?cur"><i class="icon-eye-open"></i>Current Students</a></li>          
              <li> <a href="student_list.php?det"><i class="icon-ban-circle"></i>Detend Students</a></li>          
              <li> <a href="student_list.php?lea"><i class="icon-eye-close"></i>Leaved Students</a></li>
            </ul>
          </li>          
          <?php }} if(isset($_SESSION["ffid"])){?>
            <li>
                <h2 class="sidebar-header">Old Records</h2>
            </li>
            <li> <a href='#' class="menu-link"><i class="icon-table"></i>Marks</a>
                <ul>
                    <li> <a href='old_marks_frmlist.php' class=""><i class="glyphicon-eye_open"></i>View Marks</a></li>
                </ul>
            </li>
            <li> <a href='#' class="menu-link"><i class="icon-list-ol"></i>Attendence</a>
                <ul>
                    <li> <a href='old_attendence_frmlist.php' class=""><i class="glyphicon-eye_open"></i>View Attendence</a></li>
                </ul>
            </li> <?php }if(!$s2){?>
                <li>
                  <h2 class="sidebar-header"> Marks</h2>
               </li> 
            <li><a href='practical.php'><i class="icon-desktop"></i>Practical</a></li><?php }?>
          <li>
          <h2 class="sidebar-header">Group Discussion</h2>
          </li>
          <li> <a href='add_topic_form.php' class=""><i class="icon-plus-sign-alt"></i>Add Topic</a></li>
          <li> <a href='topic_comment_list.php' class=""><i class="icon-comment"></i>Comment</a></li>
          <li>
          <h2 class="sidebar-header">Special</h2>
          </li>
          <li> <a href='message_center.php' class=""><i class="icon-envelope-alt"></i>Message Center</a></li>
      </ul>
    </div>
  </div>
</div>

  <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">View Student Attendence By Date</h5>
      </div>
      <form method="post" id="form2">
      <div class="modal-body">
                    <div class="form-group">
                    <label class="col-sm-12 control-label" for="example-chosen-multiple" style="font-size:15px;">Choose Rollno :</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar"></i></span>
							<select name="roll" class="form-control">
							    <?php
                                    $rol=mysql_query("select s.* from student_tbl s inner join student_sem_tbl ss where s.studid = ss.studid AND s.isdetend=0 AND s.isleave=0 AND ss.sem=".$_SESSION["sem"]." AND ss.year='".$_SESSION["year"]."'");
                                    while($rol1=mysql_fetch_object($rol))
                                    { echo $rol1->rollno?>
                                        <option value="<?= $rol1->studid?>"><?= $rol1->rollno?></option>
                                   <?php }
                                ?>
							</select>
						</div>
                    </div>
						<div class="form-group">
                           <label class="col-sm-12 control-label" for="example-chosen-multiple" style="font-size:15px;">From Date :</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-envelope"></i></span>
                                <input type="date"  name="min" class="form-control" value="<?= date('Y-m-d'); ?>" placeholder="DD/MM/YYYY" data-bvalidator="date[yyyy-mm-dd],required">
                            </div>
					    </div>
                        <div class="form-group">
                           <label class="col-sm-12 control-label" for="example-chosen-multiple" style="font-size:15px;">To Date :</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-envelope"></i></span>
                                <input type="date"  name="max" class="form-control" value="<?= date('Y-m-d'); ?>" placeholder="DD/MM/YYYY" data-bvalidator="date[yyyy-mm-dd],required">
                            </div>
                         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="Submit" value="Submit" name="sbtn1" class="btn btn-primary"/>
      </div>
      </form>
    </div>
  </div>
</div>
<!--logout-->
<div class="modal fade" id="exampleModalCenter12" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to logout?</h5>
      </div>
      <form method="post" id="form2">
      <div class="modal-footer">
        <a href="logout.php"><span class="btn btn-primary"><i class="icon-signout"></i>Logout</span></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>