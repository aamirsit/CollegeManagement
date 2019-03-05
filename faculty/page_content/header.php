 <header class="navbar navbar-inverse navbar-fixed-top">
    <ul class="nav header-nav pull-left">
      <li> <a href="javascript:void(0)" id="sidebar-left-toggle"> <i class="icon-reorder"></i> </a> </li>
    </ul>
    <ul class="nav header-nav pull-left" style="margin-left:43%;">
      <li>
        <a href="index.php" class="navbar-brand" style="background: transparent!important;"><img src="img/iqra.svg" width="40" height="40" alt="FreshUI"><span style="color:#B99663;">IQRA</span> </a></li>
    </ul>
    <ul class="nav header-nav pull-right">
        <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-table"><b>&nbsp;&nbsp;&nbsp;Attendance Reports</b></i> </a>
            <ul class="dropdown-menu pull-right">
                 <li class="hidden-xs hidden-sm dropdown-header text-center">Attendane Reports</li>
                  <li class="hidden-xs hidden-sm "><a href="attendence_list_rep.php">Overall Semester</a></li>
                  <li class="hidden-xs hidden-sm"><a href="#" data-toggle="modal" data-target="#exampleModalCenter1" >Between Date</a></li>
                  <li class="hidden-xs hidden-sm "><a href="attendence_count_list_rep.php">Percentage Wise</a></li>
                  <li class="hidden-xs hidden-sm "><a href="below70.php">Below 70%</a></li>
                  <li class="hidden-xs hidden-sm "><a href="blacklist.php">Black listed</a></li>
                    
            </ul>
        </li>
        <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-book"><b>&nbsp;&nbsp;&nbsp;Exams Reports</b></i> </a>
            <ul class="dropdown-menu pull-right">
                 <li class="hidden-xs hidden-sm dropdown-header text-center">Exams Reports</li>
                 <?php if($_SESSION["sem"]!=""){?><li class="hidden-xs hidden-sm "><a href="internal_30.php">Internal 30</a></li><?php }?>
                  <li class="hidden-xs hidden-sm "><a href="rankers.php">Rankers</a></li>
                  <li class="hidden-xs hidden-sm "><a href="fail.php">Fail Students</a></li>
                  <li class="hidden-xs hidden-sm "><a href="pass.php">Pass Students</a></li>
                  <li class="hidden-xs hidden-sm "><a href="sem_wise.php">Semester Wise</a></li>
                  <?php 
                    $s=mysql_query("select * from subject_tbl where fid=".$_SESSION["fid"]." group by sem");
                    if(mysql_num_rows($s)>0)
                    {?>
                  <li class="hidden-xs hidden-sm "><a href="my_subject_marks.php">Taking Subjects</a></li><?php }?>
                  <?php if($_SESSION["sem"]!=""){?><li class="hidden-xs hidden-sm "><a href="subject_wise.php">Subject Wise</a></li><?php }?>
                  <li class="hidden-xs hidden-sm "><a href="practical_list.php">Practical(60)</a></li>
            </ul>
        </li>
      <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-cogs"></i> </a>
        <ul class="dropdown-menu dropdown-custom pull-right">
          <li class="hidden-xs hidden-sm dropdown-header text-center">FULL WIDTH PAGE</li>
          <li class="hidden-xs hidden-sm">
            <div class="btn-group btn-group-justified btn-group-sm"> <a href="javascript:void(0)" class="btn btn-default" id="options-fw-disable">Disable</a> <a href="javascript:void(0)" class="btn btn-default" id="options-fw-enable">Enable</a> </div>
          </li>
          <li class="dropdown-header text-center">HEADER</li>
          <li>
            <div class="btn-group btn-group-justified btn-group-sm"> <a href="javascript:void(0)" class="btn btn-default" id="options-header-default">Default</a> <a href="javascript:void(0)" class="btn btn-default" id="options-header-inverse">Inverse</a> </div>
          </li>
          <li>
            <div class="btn-group btn-group-justified btn-group-sm"> <a href="javascript:void(0)" class="btn btn-default" id="options-header-top">Top</a> <a href="javascript:void(0)" class="btn btn-default" id="options-header-bottom">Bottom</a> </div>
          </li>
          <li class="visible-lg dropdown-header text-center">LEFT SIDEBAR MOUSE HOVER</li>
          <li class="visible-lg">
            <div class="btn-group btn-group-justified btn-group-sm"> <a href="javascript:void(0)" class="btn btn-default" id="options-hover-disable">Disable</a> <a href="javascript:void(0)" class="btn btn-default" id="options-hover-enable">Enable</a> </div>
          </li>
          <li class="hidden-lt-ie9 visible-lg dropdown-header text-center">EFFECT WHEN SIDEBARS OPEN</li>
          <li class="hidden-lt-ie9 visible-lg text-center">
            <div class="btn-group-vertical btn-group-sm" id="option-effects">
              <button class="btn btn-default" data-fx="fx-none">None</button>
              <button class="btn btn-default" data-fx="fx-opacity">Opacity</button>
              <button class="btn btn-default" data-fx="fx-move">Move</button>
              <button class="btn btn-default" data-fx="fx-push">Push</button>
              <button class="btn btn-default" data-fx="fx-rotate">Rotate</button>
              <button class="btn btn-default" data-fx="fx-push-move">Push and Move</button>
              <button class="btn btn-default" data-fx="fx-push-rotate">Push and Rotate</button>
            </div>
          </li>
        </ul>
      </li>
      <li> <a href="javascript:void(0)" id="sidebar-right-toggle"><i class="icon-user"></i></a> </li>
    </ul>
  </header>
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  