<?php if(!isset($_SESSION["lid"]))
    {
        echo "<script type='text/javascript'>
        function preventBack() {
            window.history.forward();
        }
        setTimeout('preventBack()',0);location.href='login.php'</script>";
    }
     if(isset($_REQUEST["sbtn1"]))
    {
        $min=$_REQUEST["min"];
        $max=$_REQUEST["max"];
        $sem=$_REQUEST["sem"];
        echo "<script>location.href='attendence_per_list.php?sem=$sem&min=$min&max=$max'</script>";
    }
error_reporting(0);
?>
<div id="sidebar-left" class="enable-hover">
  <div class="sidebar-content">
    <h4 style="padding-top: 0px;"><img src="img/iqra1.svg" width="45" height="auto" alt="">IQRA COLLEGE</h4><span style="position: relative;top: -30px;left: 28%;color:#888;">Year - <?= $_SESSION["year"]?></span>
    <div class="sidebar-left-scroll">
      <ul class="sidebar-nav">
        <li>
          <h2 class="sidebar-header text-center">WELCOME</h2>
        </li>
        <li> <a href="index.php" <?php if($n=="1"){echo 'class="active"';} ?>><i class="icon-coffee"></i>Dashboard</a> </li>
        <li> <a href="#" class="menu-link <?php if($n=="2"){echo "active";}?>"><i class="icon-book"></i>Sem</a>
        	<ul>       
                <?php
                $year = $_SESSION["year"];
                $flag=0;
                 $d=mysql_query("select * from student_sem_tbl where year='".$year."' group by year,sem");
                while($d1=mysql_fetch_object($d)){
                    if($d1->sem!=null && $d1->sem%2==0){
                        $flag++;
                    }}
                    if($flag!=0)
                    {   $d=mysql_query("select * from student_sem_tbl where year='".$year."' AND sem%2=0 group by year,sem");
                         while($d1=mysql_fetch_object($d)){
                    ?>
                <li> <a href="sem_info.php?sem=<?= $d1->sem ?>"><i class="glyphicon-book_open"></i><?= "Sem-".$d1->sem; ?></a>
                <?php }}else{
                            $d=mysql_query("select * from student_sem_tbl where year='".$year."'group by year,sem");
                         while($d1=mysql_fetch_object($d)){
                    ?>
                <li> <a href="sem_info.php?sem=<?= $d1->sem ?>"><i class="glyphicon-book_open"></i><?= "Sem-".$d1->sem; ?></a>
                <?php }}?>
                 </li>
            </ul>
        </li>

        <li> <a href="#" class="menu-link <?php if($n=="3"){echo 'active';}?>"><i class="glyphicon-new_window_alt"></i>Next Sem/Year</a>
            <ul>
                <li> <a href="next_sem_form1.php"><i class="glyphicon-plus"></i>Upgrade Sem</a></li>
                <li> <a href="year_form.php"><i class="glyphicon-plus"></i>Upgrade Year</a></li>
                <li> <a href="year_list.php"><i class="glyphicon-plus"></i>List Year</a></li>
            </ul>
        </li>
            <li> <a href="attendence_form.php"><i class="glyphicon-database_minus"></i>Attendance</a></li>
        <li> <a href="#" class="menu-link <?php if($n=="4"){echo 'active';}?>"><i class="glyphicon-group"></i>Faculty</a>
            <ul>
                <li> <a href="faculty_form.php"><i class="glyphicon-user_add"></i>Add Faculty</a></li>
                <li> <a href="faculty_list.php"><i class="glyphicon-list"></i>View Faculty</a></li>
            </ul>
        </li>
        <li> <a href="#" class="menu-link"><i class="glyphicon-notes_2"></i>Exam</a>
            <ul>
                <li> <a href="exam_form.php"><i class="glyphicon-notes_2"></i>Add Exam</a></li>
                <li> <a href="exam_list.php"><i class="glyphicon-list"></i>View Exams</a></li>
            </ul>
        </li>

                <li> <a href="Student_form.php"><i class="glyphicon-user_add"></i>Add Student</a></li>
            <li> <a href='#' class="menu-link <?php if($n=="5"){echo 'active';}?>"><i class="glyphicon-eye_open"></i>View Students</a>
            <ul>
              <li> <a href="student_list.php?cur"><i class="icon-eye-open"></i>Current Students</a></li>          
              <li> <a href="student_list.php?det"><i class="icon-ban-circle"></i>Detend Students</a></li>          
              <li> <a href="student_list.php?lea"><i class="icon-eye-close"></i>Leaved Students</a></li>
            </ul>
          </li>

        <li> <a href="#" class="menu-link <?php if($n=="12"){echo 'active';}?>"><i class="glyphicon-book"></i>Subjects</a>
            <ul>
                <li> <a href="subject_form.php"><i class="glyphicon-user_add"></i>Add Subject</a></li>
                <li> <a href="subject_list.php"><i class="glyphicon-list"></i>View Subject</a></li>
            </ul>
        </li>
        <li> <a href="#" class="menu-link <?php if($n=="6"){echo 'active';}?>"><i class="icon-calendar"></i>Events</a>
            <ul>
                <li> <a href="event_form.php"><i class="icon-calendar-empty"></i>Add Event</a></li>
                <li> <a href="event_list.php"><i class="icon-th-large"></i>View Event</a></li>
            </ul>
        </li>
        <li> <a href="#" class="menu-link <?php if($n=="9"){echo 'active';}?>"><i class="halfling-list-alt"></i>News</a>
            <ul>
                <li> <a href="news_form.php"><i class="icon-calendar"></i>Add News</a></li>
                <li> <a href="news_list.php"><i class="glyphicon-list"></i>Update News</a></li>
            </ul>
        </li>
        <li> <a href="#" class="menu-link <?php if($n=="7"){echo 'active';}?>"><i class="glyphicon-conversation"></i>Group Discussion</a>
            <ul>
                <li> <a href="add_topic_form.php"><i class="icon-plus-sign-alt icon-fixed-width"></i>Add topic</a></li>
                <li> <a href="topic_comment_list.php"><i class="glyphicon-chat"></i>comment</a></li>
            </ul>
        </li>

        <li> <a href="message_center.php" <?php if($n=="8"){echo 'class="active"';}?>><i class="icon-envelope-alt icon-fixed-width"></i>Mail</a></li>
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
							<select name="sem" class="form-control">
							    <?php $d=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' group by year,sem");
                			while($d1=mysql_fetch_object($d)){
                            if($d1->sem!=null && $d1->sem%2==0){
                                $flag++;
                            }}
                            if($flag!=0)
                            {   $d=mysql_query("select * from student_sem_tbl where year='".$year."' AND sem%2=0 group by year,sem");
                                 while($d1=mysql_fetch_object($d)){
                            ?>
								<option value="<?= $d1->sem?>" <?php if(isset($_REQUEST["sem"]) && $_REQUEST["sem"]==$d1->sem){echo "Selected";}?>>SEM-<?= $d1->sem ?></option>
				            <?php }}else{
                            $d=mysql_query("select * from student_sem_tbl where year='".$year."'group by year,sem");
                         while($d1=mysql_fetch_object($d)){
                            ?><option value="<?= $d1->sem?>" <?php if(isset($_REQUEST["sem"]) && $_REQUEST["sem"]==$d1->sem){echo "Selected";}?>>SEM-<?= $d1->sem ?></option>
							<?php }}?>
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
        <a href="page_content/logout.php"><span class="btn btn-primary"><i class="icon-signout"></i>Logout</span></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>