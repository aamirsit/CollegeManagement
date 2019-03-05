<header class="navbar navbar-fixed-top navbar-inverse">
    <ul class="nav header-nav pull-right">
    <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle backup"  title="Database Backup"> <i class="icon-cloud-download"></i></a>
    </li>
     <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-table">
        <b>&nbsp;&nbsp;&nbsp;Attendance Reports</b></i> </a>
            <ul class="dropdown-menu pull-right">
                 <li class="hidden-xs hidden-sm dropdown-header text-center">Attendane Reports</li>
                 <li class="hidden-xs hidden-sm "><a href="attendence_list_rep.php">Overall Semester</a></li>
                 <li class="hidden-xs hidden-sm"><a href="#" data-toggle="modal" data-target="#exampleModalCenter1" >Between Date</a></li>
                 <li class="hidden-xs hidden-sm "><a href="attendence_count_list_rep.php">Percentage Wise</a></li>
                 <li class="hidden-xs hidden-sm "><a href="below70.php">Below 70%</a></li>
                 <li class="hidden-xs hidden-sm "><a href="blacklist.php">Black listed</a></li>
                 <li  class="hidden-xs hidden-sm "> <a href='old_attendence_frmlist.php'>Old Attendence</a> 
            </ul>
        </li>
        <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-book"><b>&nbsp;&nbsp;&nbsp;Exams Reports</b></i> </a>
            <ul class="dropdown-menu pull-right">
                 <li class="hidden-xs hidden-sm dropdown-header text-center">Exams Reports</li>
                 <li class="hidden-xs hidden-sm "><a href="internal_30.php">Internal 30</a></li>
                 <li class="hidden-xs hidden-sm "><a href="rankers.php">Rankers</a></li>
                 <li class="hidden-xs hidden-sm "><a href="fail.php">Fail Students</a></li>
                 <li class="hidden-xs hidden-sm "><a href="pass.php">Pass Students</a></li>
                 <li class="hidden-xs hidden-sm "><a href="sem_wise.php">Semester Wise</a></li>
                 <li class="hidden-xs hidden-sm "><a href="subject_wise.php">Subject Wise</a></li>
                 <li class="hidden-xs hidden-sm "><a href="practical_list.php">Practical(60)</a></li>
                 <li  class="hidden-xs hidden-sm "> <a href='old_marks_frmlist.php'>Old Marks</a></li>
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
      <li> <a href="javascript:void(0)" id="sidebar-right-toggle"> <strong>5</strong> <i class="icon-user"></i> </a> </li>
    </ul>
    <ul class="nav header-nav pull-left">
      <li> <a href="javascript:void(0)" id="sidebar-left-toggle"> <i class="icon-reorder"></i> </a> </li>
    </ul>
    <a href="index.php" class="navbar-brand" style="background: transparent!important;"><img src="img/iqra1.svg" width="40" height="40" alt="FreshUI"><span style="color:#B99663;">IQRA</span> </a> 
  </header>
<script>
    $(document).ready(function(){
       $('.backup').click(function(){
           $.ajax({
              type: "POST",
              url : "./ajax_page/backup.php",
              success:function(data){
                  pops(data,'success');
              }
           });
       }); 
    });
</script>