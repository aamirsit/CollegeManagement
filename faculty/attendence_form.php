<?php 
$table="attendence_tbl";
$pk="attid";
$nm="attendence";
$name="Attendance";
if(isset($_REQUEST["sbtn"])) {
    include("DatabaseFiles/cn.php");
            $studid="";
            $dt=mysql_query("select * from attendence_tbl where attenddate='".$_REQUEST['attenddate']."' AND sem=".$_SESSION["sem"]);
            if($_REQUEST["h2"]=="")
            {
                if(isset($_REQUEST["studid"]))
                {
                     for($i=0;$i<count($_REQUEST["studid"]);$i++)
                    { 
                            $studid.=$_REQUEST["studid"][$i].",";
                    }
                    if(mysql_num_rows($dt)<=0)
                    {
                        $col=array($pk,'studid','attenddate','fid','sem');
                        $val=array(null,$studid, $_REQUEST['attenddate'],$_SESSION["fid"],$_SESSION["sem"]);
                        $db->insert($table, $col, $val);
                    }
                        else{
                            echo "<script>location.href='attendence_form.php?un';</script>";
                        }
                }
                else 
                    {   if(mysql_num_rows($dt)<=0)
                        {
                            $col=array($pk,'studid','attenddate','fid','sem');
                            $val=array(null,'', $_REQUEST['attenddate'],$_SESSION["fid"],$_SESSION["sem"]);
                            $db->insert($table, $col, $val);
                        }
                        else{
                            echo "<script>location.href='attendence_form.php?un';</script>";
                        }
                    }
                echo "<script>location.href='attendence_list.php?success'</script>";
            }
            else
            {
                if(isset($_REQUEST["studid"]))
                {
                     for($i=0;$i<count($_REQUEST["studid"]);$i++)
                    { 
                        $studid.=$_REQUEST["studid"][$i].",";
                    }
                    $col=array($pk,'studid','attenddate','fid','sem');
                    $val=array($_REQUEST["eid"],$studid, $_REQUEST['attenddate'],$_SESSION["fid"],$_SESSION["sem"]);
                    $db->update($table,$pk,$_REQUEST["h2"], $col, $val);
                }
                else
                {
                   $col=array($pk,'studid','attenddate','fid','sem');
                    $val=array($_REQUEST["eid"],'', $_REQUEST['attenddate'],$_SESSION["fid"],$_SESSION["sem"]);
                    $db->update($table,$pk,$_REQUEST["h2"], $col, $val); 
                }
               echo "<script>location.href='attendence_list.php?upd'</script>";
            }
}
include("page_content/frmheader.php");	
if(isset($_REQUEST["eid"]))	{
    $r=mysql_fetch_object(mysql_query("select * from $table where $pk='".$_REQUEST["eid"]."'"));
		$studid=$r->studid;
		$attenddate=$r->attenddate;
		$id=$r->$pk;
	}else{
		$studid="";
		$attenddate="";
		$id="";
	}
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $("#studlist").hide();
                $(".studl").find('option').remove().end();
            }
            else if($(this).prop("checked") == false){
                $("#studlist").show();
            }
        });
    });
</script>
   <!-- Modal -->
<?php
    if(isset($_REQUEST["sbtn1"]))
    {
        $min=$_REQUEST["min"];
        $max=$_REQUEST["max"];
        $studid=$_REQUEST["roll"];
        echo "<script>location.href='attendence_stud_list.php?studid=$studid&min=$min&max=$max'</script>";
    }
?>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">View Student Attendence By Date</h5>
      </div>
      <form method="post" id="form1">
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
    <div class="form-group" style="margin-left:66%;margin-top:30px;">    
        <div class="btn-group">
            <a href="" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu text-left">
                    <li><a href="attendence_list.php">Overall Attendence</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter" >Between Date</a></li>
                    <li> <a href="attendence_count_list.php" >Percentage Wise</a></li>
                </ul>
        </div>
    </div>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
                    <div class="form-group">
                    <label class="col-sm-12 control-label" for="example-chosen-multiple" style="font-size:15px;">Choose Date :</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar"></i></span>
							<input type="text" id="example-datepicker2" name="attenddate" class="form-control input-datepicker" value="<?php if(isset($_REQUEST["eid"])){echo $attenddate;}else echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" data-bvalidator="date[yyyy-mm-dd],required">
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-12 control-label" style="font-size:15px;">Present All :</label>
                        <div class="col-sm-12">
                            <div class="checkbox">
                                <label for="example-checkbox3">
                                <input type="checkbox" id="ossm" name="present" class="present" value="present" onclick="set_present()">Present
                                </label>
                            </div>
                        </div>
                    </div>
				    <div class="form-group" id="studlist">
                    <label class="col-sm-12 control-label" for="example-chosen-multiple"  style="font-size:15px;">Choose Absent RollNos :</label>
                        <div class="col-sm-12">
                            <select id="example-chosen-multiple" name="studid[]" class="select-chosen studl" data-placeholder="Choose Absent Rollnos" style="width: 600px;" multiple>
                                <?php 
                                    $r=mysql_query("select student_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_SESSION["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'");
                                    while($r1=mysql_fetch_object($r))
                                    {
                                        if(isset($_REQUEST["eid"])){
                                        $temp=mysql_query("select * from attendence_tbl where studid like '%".$r1->studid.",%' and attid='".$_REQUEST["eid"]."'");
                                        if(mysql_num_rows($temp)>0)
                                        {
                                            $sel="Selected";
                                        }
                                        else
                                        {
                                            $sel="";
                                        }
                                        }
                                        else
                                        {
                                            $sel="";
                                        }
                                ?>
                                <option value="<?= $r1->studid?>" <?= $sel;?>><?= $r1->rollno?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $id ?>" name="h2" placeholder="Last Name">
                    <div class="form-group">
						<input type="submit" name="sbtn" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</DIV>
<?php include("page_content/frmfooter.php");
if(isset($_REQUEST['un']))
{
    echo "<script>$(document).ready(function(){ pops('Attendance Already done!','error');});</script>";
}
?>