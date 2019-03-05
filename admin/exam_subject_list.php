<?php include("DatabaseFiles/cn.php");
$table="exam_result_tbl";
$pk="erid";
$nm="exam_subject";
$exid=$_REQUEST['exid'];
$subid=$_GET['subid'];
$sem = $_REQUEST["sem"];
$n=0;
if(isset($_REQUEST["sbtn"]))
    {include_once("DatabaseFiles/cn.php");
            for($i=0;$i<count($_REQUEST["marks"]);$i++)
            {
                $col=array('smid','exid','subid','marks');
                $val=array($_REQUEST['smid'][$i],$exid,$subid,$_REQUEST['marks'][$i]);
                $smid=$_REQUEST['smid'][$i];
                $p=mysql_query("select * from exam_result_tbl where smid=$smid AND exid=$exid AND subid=$subid");
                $pk=mysql_fetch_object($p);
                $db->update($table,'erid',$pk->erid, $col, $val);
            }
         echo "<script>location.href='exam_subject_list.php?sem=".$_REQUEST['sem']."&exid=".$_REQUEST['exid']."&subid=".$_REQUEST['subid']."&success';</script>";
    }
include("page_content/listheader.php");	
?>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
                      <span class="form-group" style="font-size:30px;color:orange;">
                          <?php
                     
                                $e=mysql_query("select * from exam_tbl where exid=".$exid);
                                $s=mysql_query("select * from subject_tbl where subid=".$subid);
                                $e1=mysql_fetch_object($e);
                                $s1=mysql_fetch_object($s);
                          echo $e1->exname ?>
                      </span><span style="font-size:30px;color:orange;"><?= "- ".$s1->sname ?></span>
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
                                $r=mysql_query("select student_sem_tbl.* from student_sem_tbl inner join exam_result_tbl where student_sem_tbl.smid = exam_result_tbl.smid  AND exam_result_tbl.subid=$subid AND student_sem_tbl.year='".$_SESSION["year"]."' AND student_sem_tbl.sem=$sem AND exam_result_tbl.exid=$exid");
                                while($r1=mysql_fetch_object($r))
                                {$con=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));
                                    $smid=$r1->smid;
                                    $st=mysql_query("select student_tbl.* from student_sem_tbl inner join student_tbl where student_sem_tbl.studid = student_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.year='".$_SESSION["year"]."' AND student_sem_tbl.smid=$smid");
                                    $mr=mysql_query("select * from exam_result_tbl where smid=$smid AND exid=$exid AND subid=$subid");
                                    while($st1=mysql_fetch_object($st))
                                    {
                                ?>

                                <tr>
                                    <td class='text-center'><?= $st1->rollno;?></td>
                                    <td><?=  $st1->fname." ".$st1->lname;?></td>
                                    <?php while($mr1=mysql_fetch_object($mr))
                                    {
                                    ?>
                                    <td><input type="text" data-bvalidator="min[0],max[<?= $con->marks?>],required" name="marks[]" value="<?= $mr1->marks?>"></td>
                                    <?php }?>
                					<input type="hidden" name="smid[]" value='<?= $r1->smid?>'>
                                </tr>
                                <?php }}?>
                            </tbody>
				        </table>
                    </div>  
					<div class="form-group">
						<input type="submit" name="sbtn" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
    include("page_content/listfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Marks Updated!','success');});</script>";
}
?>