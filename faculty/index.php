<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php include('page_content/head.php') ?>
<body class="header-fixed-top">
<?php include('page_content/left-side.php') ?>
<?php include('page_content/right-side.php') ?>
<div id="page-container" class="full-width">
 <?php include('page_content/header.php') ?>
<style>
            body {
  background: #eee;
}

svg {
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.filler {
  background: #20B7AF;
  position: absolute;
  bottom: 50%;
  top: 0;
  left: 0;
  right: 0;
}
        </style>
<script>
            $(document).ready(function(){
               
            var hands = [];
hands.push(document.querySelector('#secondhand > *'));
hands.push(document.querySelector('#minutehand > *'));
hands.push(document.querySelector('#hourhand > *'));

var cx = 200;
var cy = 100;

function shifter(val) {
  return [val, cx, cy].join(' ');
}

var date = new Date();
var hoursAngle = 360 * date.getHours() / 12 + date.getMinutes() / 2;
var minuteAngle = 360 * date.getMinutes() / 60;
var secAngle = 360 * date.getSeconds() / 60;

hands[0].setAttribute('from', shifter(secAngle));
hands[0].setAttribute('to', shifter(secAngle + 360));
hands[1].setAttribute('from', shifter(minuteAngle));
hands[1].setAttribute('to', shifter(minuteAngle + 360));
hands[2].setAttribute('from', shifter(hoursAngle));
hands[2].setAttribute('to', shifter(hoursAngle + 360));

for(var i = 1; i <= 12; i++) {
  var el = document.createElementNS('http://www.w3.org/2000/svg', 'line');
  el.setAttribute('x1', '200');
  el.setAttribute('y1', '60');
  el.setAttribute('x2', '200');
  el.setAttribute('y2', '65');
  el.setAttribute('transform', 'rotate(' + (i*360/12) + ' 200 100)');
  el.setAttribute('style', 'stroke:#ffffff;');
  document.querySelector('svg').appendChild(el);
} 
            });
        </script>
  <div id="fx-container" class="fx-opacity">
    <div id="page-content" class="block" style="min-height:618px;">
      <div class="block-header">
        <div class="row remove-margin">
          <div class="col-sm-4"> <a href="#" class="header-title-link">
            <h1><i>
            <svg width="400" height="200" viewBox="0 -5 200 200">

    <filter id="innerShadow" x="-20%" y="-20%" width="140%" height="140%">
        <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur"/>
        <feOffset in="blur" dx="2.5" dy="2.5"/>
    </filter>

    <g>
        <circle id="shadow" style="fill:rgba(0,0,0,0.1)" cx="197" cy="98" r="57" filter="url(#innerShadow)"></circle>
        <circle id="circle" style="stroke: #FFF; stroke-width: 12px; fill:rgb(135,100,39);" cx="200" cy="100" r="50"></circle>
    </g>
    <g>
        <line x1="200" y1="100" x2="200" y2="70" transform="rotate(80 100 100)" style="stroke-width: 2px; stroke: #fffbf9;" id="hourhand">
            <animatetransform attributeName="transform"
                              attributeType="XML"
                              type="rotate"
                              dur="43200s"
                              repeatCount="indefinite"/>
        </line>
        <line x1="200" y1="100" x2="200" y2="65" style="stroke-width: 3px; stroke: #fdfdfd;" id="minutehand">
            <animatetransform attributeName="transform"
                              attributeType="XML"
                              type="rotate"
                              dur="3600s"
                              repeatCount="indefinite"/>
        </line>
        <line x1="200" y1="100" x2="200" y2="57" style="stroke-width: 2px; stroke:#000000" id="secondhand">
            <animatetransform attributeName="transform"
                              attributeType="XML"
                              type="rotate"
                              dur="60s"
                              repeatCount="indefinite"/>
        </line>
    </g>
    <circle id="center" style="fill:#128A86; stroke: #C1EFED; stroke-width: 2px;" cx="200" cy="100" r="3"></circle>
</svg></i>Dashboard<br>
              <small>Welcome <?= $_SESSION["name"];?>!</small></h1>
            </a> </div>
          <div class="col-sm-8">
            <div class="row">
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-xs-6"> <a href="" class="header-link">
                    <h1 class="animation-pullDown"><?php if($_SESSION["sem"]!=""){echo $_SESSION["sem"];}else echo "--";?><br>
                      <small>Semester Incharge</small></h1>
                    </a> </div>
                  <div class="col-xs-6"> <a href="student_list.php?cur" class="header-link">
                    <h1 class="animation-pullDown"><?php 
                            $r=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' AND sem=".$_SESSION["sem"]);
                            if($r)
                            {
                            echo mysql_num_rows($r);}else{echo "--";}
                        ?><br>
                      <small>Total Students</small></h1>
                    </a> </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-xs-6"> <a href="message_center.php" class="header-link">
                    <h1 class="animation-pullDown"><?php
                            $r=mysql_query("select * from mail_to_tbl where mailto=".$_SESSION["fid"]." AND  isread=0 AND isdelete=0");
                            echo mysql_num_rows($r);
                        ?><br>
                      <small>New Messages</small></h1>
                    </a> </div>
                  <div class="col-xs-6"> <a href="message_center.php" class="header-link">
                    <h1 class="animation-pullDown"><?php
                            $r=mysql_query("select * from mail_to_tbl where mailto=".$_SESSION["fid"]." AND isdelete=0");
                            echo mysql_num_rows($r);
                        ?><br>
                      <small>Inbox</small></h1>
                    </a> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ul class="breadcrumb breadcrumb-top">
        <li><i class="icon-coffee"></i></li>
        <li><a href="#">Dashboard</a></li>
      </ul>
      <div class="row gutter30" style="padding:5% 0 5% 0;">
         <?php  
            $s=mysql_query("select * from subject_tbl where fid=".$_SESSION["fid"]." group by sem");
            $s2=mysql_fetch_object($s);
            if($s2)
            {?><div class="col-sm-6 col-md-6 col-xs-12 col-lg-3">
          <div class="block full" style="height:180px;border-radius:20px;">
            <div class="block-title">
              <div class="block-options pull-right">
                <div class="btn-group btn-group-sm"> <a href="javascript:void(0)" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">View Marks&nbsp;&nbsp;<span class="caret"></span></a>
                  <ul class="dropdown-menu pull-right"><?php if($_SESSION["sem"]!=""){?>
                    <li><a href="exam_report_list.php">SEM <?= $_SESSION["sem"]?> Marks</a></li>
                    <li><a href="internal_30.php">Internal (30)</a></li><?php }?>
                    <li><a href="my_subject_marks.php">My Subject Marks</a></li>
                  </ul>
                </div>
              </div>
              <h2><i class="glyphicon-podium"></i>&nbsp;&nbsp;&nbsp;Marks</h2>
            </div>
            <form>
              <div class="input-group" style="left:50%;top:50%;transform:translate(-50%,50%);">
                <?php $flag=0;
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
                while($s1=mysql_fetch_object($s))
                 { 
            ?>   <div class="btn-group btn-group-lg" style="margin-right:10px;" data-toggle="tooltip" title="Subject Marks"> <a href="javascript:void(0)"  class="btn btn-default dropdown-toggle" style="width:100px;" data-toggle="dropdown">SEM <?= $s1->sem?>&nbsp;&nbsp;&nbsp;<span class="caret"></span></a>
                 <ul class="dropdown-menu pull-right"><?php 
                       $r=mysql_query("select * from subject_tbl where fid=".$_SESSION["fid"]." AND sem=".$s1->sem);
                        while($r1=mysql_fetch_object($r))
                        {
                     ?>
                     <li><a href='exam_subject_form.php?subid=<?= $r1->subid?>'><?= $r1->sname?></a></li><?php }?></ul></div>
                <?php }?> </div>
            </form>
          </div>
          </div> <?php } if($_SESSION["sem"]!=""){?>
          <div class="col-sm-6 col-md-6 col-xs-12 col-lg-3"> 
          <div class="block full" style="height:180px;border-radius:20px;">
            <div class="block-title">
              <h2><i class="icon-th"></i>&nbsp;&nbsp;&nbsp;Attendance</h2>
            </div>
            <form >
             <div class="input-group" style="left:50%;top:50%;transform:translate(-50%,50%);">
              <?php 
                $r=mysql_query("select faculty_sem_tbl.* from login_tbl inner join faculty_sem_tbl where login_tbl.fid=faculty_sem_tbl.fid AND faculty_sem_tbl.sem=".$_SESSION["sem"]." AND faculty_sem_tbl.year='".$_SESSION["year"]."'");
                while($r1=mysql_fetch_object($r))
                {
            ?>
                 <div class="btn-group btn-group-lg" data-toggle="tooltip" title="Attendance"> <a href="attendence_form.php"  class="btn btn-default" style="width:160px;">SEM <?= $r1->sem?></a></div><?php }?></div>
            </form>
          </div>
        </div><?php }?>
       <?php if(isset($_SESSION["ffid"])){?>
        <div class="col-sm-6 col-md-6 col-xs-12 col-lg-3">
          <div class="block" style="height:180px;border-radius:20px;">
            <div class="block-title">
              <h2 class="text-center"><i class="icon-suitcase"></i>&nbsp;&nbsp;&nbsp;Old Records </h2>
            </div>
            <form >
             <div class="input-group" style="left:50%;top:50%;transform:translate(-50%,50%);">
            <div class="btn-group btn-group-lg" style="margin-right:10px;" data-toggle="tooltip" title="Old Marks"> <a href="old_marks_frmlist.php"  class="btn btn-default " style="width:100px;">Marks</a>
            </div>
             <div class="btn-group btn-group-lg" data-toggle="tooltip" title="Old Attendance"> <a href="old_attendence_frmlist.php"  class="btn btn-default " style="width:100px;padding-left:0px;">Attendance&nbsp;&nbsp;&nbsp;</a>
            </div>
             </div>
              </form>
          </div>
          </div><?php }?>
         <div class="<?php 
                     if(!isset($_SESSION["ffid"]) && !isset($_SESSION["sem"]) && !$s2){echo "col-sm-3 col-md-3 col-xs-3";}else{echo "col-sm-6 col-md-6 col-xs-12 col-lg-3";}
                     ?>">
          <div class="block" style="height:180px;border-radius:20px;">
            <div class="block-title">
              <h2 class="text-center"><i class="glyphicon-parents"></i>&nbsp;&nbsp;&nbsp;Group Discussion</h2>
            </div>
            <form >
             <div class="input-group" style="left:50%;top:50%;transform:translate(-50%,50%);">
            <div class="btn-group btn-group-lg" style="margin-right:10px;" data-toggle="tooltip" title="Add Topic"> <a href="add_topic_form.php"  class="btn btn-default " style="width:100px;padding-left:10px;">Add Topic</a>
            </div>
             <div class="btn-group btn-group-lg" data-toggle="tooltip" title="Comment"> <a href="topic_comment_list.php"  class="btn btn-default " style="width:100px;padding-left:10px;">Comment&nbsp;&nbsp;&nbsp;</a>
            </div></div>
              </form>
          </div>
          </div>
      </div>
      </div>
    </div>
    <!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->
    <?php include('page_content/footer.php'); 
    if(isset($_REQUEST['success']))
    {
        echo "<script>$(document).ready(function(){ pops('Logged In Successfully!','success');});</script>";
    }  
    ?>
  </div>
</div>
<a href="javascript:void(0)" id="to-top"><i class="icon-angle-up"></i></a>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.10.2.min.js"%3E%3C/script%3E'));</script>
<script src="js/vendor/bootstrap.min-1.03.js"></script>
<script src="js/plugins-1.03.js"></script>
<script src="js/main-1.03.js"></script>
<script>$(function(){$(".timeline-con").slimScroll({height:565,color:"#000000",size:"3px",touchScrollStep:750,distance:"0"}),$(".timeline").css("min-height","565px");var e=$("#status-update"),t="";$("#accept-request").click(function(){$(this).replaceWith('<span class="label label-success">Awesome, you became friends!')}),$("#status-update-btn").click(function(){t=e.val(),t&&($(".timeline-con").slimScroll({scrollTo:"0px"}),$(".timeline").prepend('<li class="animation-pullDown"><div class="timeline-item"><h4 class="timeline-title"><small class="timeline-meta">just now</small><i class="icon-file"></i> Status</h4><div class="timeline-content"><p>'+$("<div />").text(t).html().substring(0,200)+"</p><em>Demo functionality</em></div>"+"</div>"+"</li>"),e.val("").attr("placeholder","I hope you like it! :-)"))});var n=$("#chart-classic"),l=[[0,60],[1,100],[2,80],[3,84],[4,124],[5,90],[6,150]],a=[[0,30],[1,50],[2,40],[3,42],[4,62],[5,45],[6,75]];$.plot(n,[{data:l,lines:{show:!0,fill:!0,fillColor:{colors:[{opacity:.25},{opacity:.25}]}},points:{show:!0,radius:7}},{data:a,lines:{show:!0,fill:!0,fillColor:{colors:[{opacity:.15},{opacity:.15}]}},points:{show:!0,radius:7}}],{colors:["#f39c12","#2e3030"],legend:{show:!1},grid:{borderWidth:0,hoverable:!0,clickable:!0},yaxis:{show:!1},xaxis:{show:!1}});var o=null,i=null;n.bind("plothover",function(e,t,n){if(n){if(o!==n.dataIndex){o=n.dataIndex,$("#chart-tooltip").remove();var l=(n.datapoint[0],n.datapoint[1]);i=1===n.seriesIndex?"<strong>"+l+"</strong> sales":"$ <strong>"+l+"</strong>",$('<div id="chart-tooltip" class="chart-tooltip">'+i+"</div>").css({top:n.pageY-45,left:n.pageX+5}).appendTo("body").show()}}else $("#chart-tooltip").remove(),o=null})});</script>
<div class="pop animated slideInRight" style="z-index:99;text-align:center;background:;display:flex;opacity:0;position: fixed;top:80%;left:75%;visibility:hidden">
    <div class="msg" style="padding-top:12px;width:250px;height:50px auto;background-color:#222843;border-top-left-radius:5px;border-bottom-left-radius:5px;font-size:18px;color:#FFE">
    </div>     
    <div class="ic" style="padding-top:12px;width:50px;height:50px;border-top-right-radius:5px;border-bottom-right-radius:5px;background-color:#90D473;font-size:1.5em;color:#FFE">
    <i class="icon-smile" style="font-size:1.5em;"></i>
    </div>  
</div>
<script>
    function pops(msg,icon){
                $('.pop').css('visibility','visible');
                //variable for function
                var string = $('#uname').text(),text = string.split(" "),name = text[1];
                var red = "#ef8989",green = "#90d473",blue = "#83c6e4";

                if(icon == "error") {
                    $('.msg').text(msg);
                    $('.pop i').attr('class', "icon-ban-circle");
                    var he = $('.msg').height();
                    $('.ic').css({background:red,'padding-top': he/2-3+"px"}).height(he);
                    $('.pop').css({'display':'flex','opacity':'1'});
                    setTimeout(function(){
                       $('.pop').addClass('animated slideOutRight');
                    },3000);
                    $('.pop').delay(3500).fadeOut();
                }else if(icon == "success") {
                    $('.msg').text(msg);
                    $('.pop i').attr('class', "icon-smile");
                     var he = $('.msg').height();
                    $('.ic').css({background:green,'padding-top': he/2-3+"px"}).height(he);

                    $('.pop').css({'display':'flex','opacity':'1'});
                    setTimeout(function(){
                       $('.pop').addClass('animated slideOutRight');
                    },3000);
                    $('.pop').delay(3500).fadeOut();
                }else {
                    $('.msg').text(msg);
                    $('.pop i').attr('class', "icon-exclamation");
                     var he = $('.msg').height();
                    $('.ic').css({background:blue,'padding-top': he/2-3+"px"}).height(he);
                    $('.pop').css({'display':'flex','opacity':'1'});
                    setTimeout(function(){
                       $('.pop').addClass('animated slideOutRight');
                    },3000);
                    $('.pop').delay(3500).fadeOut();
                }
            }
</script>
</body>
</html>