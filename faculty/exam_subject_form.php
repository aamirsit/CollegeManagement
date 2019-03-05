<?php 
$table="exam_result_tbl";
$pk="erid";
$nm="exam_subject";
$name="Subject Marks";
$subid=$_GET['subid'];
if(isset($_REQUEST["sbtn"])) 
    { include("DatabaseFiles/cn.php");
            
            if(!isset($_REQUEST["update"]))
            {
              for($i=0;$i<count($_REQUEST["marks"]);$i++)
                {
                        $col=array($pk,'smid','exid','subid','marks');
                        $val=array(null,$_REQUEST['smid'][$i],$_REQUEST['h2'],$_REQUEST['subid'],$_REQUEST['marks'][$i]);
                        $db->insert($table, $col, $val);
                        echo "<script>location.href='exam_subject_form.php?success&subid=".$_REQUEST['subid']."';</script>";
                }
            }
            else
            {
                
                 for($i=0;$i<count($_REQUEST["marks"]);$i++)
                    {
                        $col=array('smid','exid','subid','marks');
                        $val=array($_REQUEST['smid'][$i],$_REQUEST["h2"],$subid,$_REQUEST['marks'][$i]);
                        $smid=$_REQUEST['smid'][$i];
                        $p=mysql_query("select * from exam_result_tbl where smid=$smid AND exid=".$_REQUEST["h2"]." AND subid=$subid");
                        $pk=mysql_fetch_object($p);
                        $db->update($table,'erid',$pk->erid, $col, $val);
                    }
                  echo "<script>location.href='exam_subject_form.php?upd&subid=".$_REQUEST['subid']."';</script>";
            }
     $flag=1;
	}else{
    $flag=0;
}
include("page_content/frmheader.php");	
?>
<style type="text/css">
    .sbtn{
        visibility: hidden;
    }
</style>
<link href="css/bvalidator.theme.gray2.css" rel="stylesheet">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.bvalidator-yc.js"></script>
<script src="js/jquery.bvalidator.js"></script>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
                <form method="post" id="form1">
                    <div class="form-group" style="margin-top:-100px;">
                        <h2><?php $sub=mysql_fetch_object(mysql_query("select * from subject_tbl where subid=".$_REQUEST["subid"])); echo $sub->sname;?></h2>
                    </div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><b>Select Exam</b></span>
							<select name="exam" class="form-control" style="width:200px;" >
                                <option disabled selected>Choose</option>
							    <?php 
                                    $e=mysql_query("select * from exam_tbl");
                                    while($e1=mysql_fetch_object($e))
                                    { if($e1->exname!="Practical"){
                                ?>
                                <option value='<?= $e1->exid; ?>' <?php if(isset($_REQUEST["exam"])){if($_REQUEST["exam"]==$e1->exid){echo "SELECTED";}}?> ><?= $e1->exname; ?></option>
                                <?php }}?>
							</select>
                        </div>
                    </div>
                      <div class="form-group ssbtn" style="margin:-50px 0 20px 350px;">
				         <span class="input-group-btn">
                            <button type="submit" data-toggle='tooltip' title='Search'  name="ssbtn" class="btn btn-primary"><i class="icon-search"></i> Search</button>
                         </span>
                     </div><?php if(isset($_REQUEST["ssbtn"]))
                                {?>
                                <style type="text/css">
                                    .sbtn{
                                        visibility: visible;
                                    }
                                </style>
                       <div class="table-responsive">
                        <table id="example-datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">RollNO</th>
                                    <th>Name</th>
                                    <th>Marks</th>
                                </tr>
                            </thead>
                            <tbody>    
                            <?php
                                    if(isset($_REQUEST["exam"]))
                                    {
                                    $x=mysql_fetch_object(mysql_query("select * from subject_tbl where subid=".$_REQUEST["subid"]));
                                    $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_sem_tbl inner join student_tbl where student_sem_tbl.studid = student_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=$x->sem AND student_sem_tbl.year='".$_SESSION["year"]."'");   
                                    while($r1=mysql_fetch_object($r))
                                    { $con=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exam"]));
                                    ?>

                                    <tr>
                                        <td class='text-center'><?= $r1->rollno;?></td>
                                        <td><?=  $r1->fname." ",$r1->lname;?></td>
                                        <?php 
                                            if(isset($_REQUEST["h2"]))
                                            {
                                        $mr1=mysql_fetch_object(mysql_query("select * from exam_result_tbl where smid=$r1->smid AND exid=".$_REQUEST["exam"]." AND subid=".$_REQUEST["subid"]));
                                        if(!$mr1)
                                        {?>
                                          <td><input data-bvalidator="min[0],max[<?= $con->marks?>],required" type="text" name="marks[]" value=""></td><?php }else{
                                        ?>
                                        <input type="hidden" value="update" name="update">
                                        <td><input data-bvalidator="min[0],max[<?= $con->marks?>],required" type="text" name="marks[]" value="<?= $mr1->marks?>"></td><?php }?>
                                        <input type="hidden" name="smid[]" value='<?= $r1->smid?>'>
                                    </tr>
                                    <?php }}}}?>
                            </tbody>
				        </table>
                    </div>  
					<input type="hidden" value="<?= $_REQUEST["exam"]; ?>" name="h2" placeholder="Last Name">
					<div class="form-group">
						<input type="submit"  name="sbtn" class="btn btn-primary sbtn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
    <script>$(function(){webApp.datatables(),$("#example-datatable").dataTable({aoColumnDefs:[{bSortable:!1,aTargets:[2]}],iDisplayLength:-1,aLengthMenu:[[2,30,50,-1],[2,30,50,"All"]]}),$(".dataTables_filter input").addClass("form-control").attr("placeholder","Search")});</script>
<?php 
    include("page_content/frmfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Marks Inserted Successful!','success');});</script>";
}
if(isset($_REQUEST['upd']))
{
    echo "<script>$(document).ready(function(){ pops('Marks Updated Successful!','success');});</script>";
}
?>
