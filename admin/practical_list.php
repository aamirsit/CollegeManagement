<?php include("DatabaseFiles/cn.php");
$table="exam_result_tbl";
$pk="erid";
$nm="Practical (60)";
$name="Practical (60)";
$n=0;
if(isset($_REQUEST["excel"]))
{
        echo "<script>location.href='../faculty/excel-report/practical_report.php?sem=".$_REQUEST['sem']."';</script>";
}
include("page_content/listheader.php");	
include("page_content/printheader.php");	
?>
</ul>
	<div class="row gutter30">
	   <form method="post" id="form1">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><b>Select SEM</b></span>
							<select name="sem" class="form-control" style="width:200px;" >
                                <option disabled selected>Choose</option>
							    <?php 
                                    $e=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' group by sem");
                                    while($e1=mysql_fetch_object($e))
                                    {if($e1->sem!=null && $e1->sem%2==0){
                                $flag++;
                            }}
                            if($flag!=0)
                            {   $e=mysql_query("select * from student_sem_tbl where year='".$year."' AND sem%2=0 AND  sem!=6 group by year,sem");
                                 while($e1=mysql_fetch_object($e)){
                            ?>
                                <option value='<?= $e1->sem; ?>' <?php if(isset($_REQUEST["sem"])){if($_REQUEST["sem"]==$e1->sem){echo "SELECTED";}}?> >SEM-<?= $e1->sem; ?></option>
                                 <?php }}else{
                            $e=mysql_query("select * from student_sem_tbl where year='".$year."'group by year,sem");
                         while($e1=mysql_fetch_object($e)){
                            ?><option value='<?= $e1->sem; ?>' <?php if(isset($_REQUEST["sem"])){if($_REQUEST["sem"]==$e1->sem){echo "SELECTED";}}?> >SEM-<?= $e1->sem; ?></option><?php }}?>
							</select>
                        </div>
                    </div>
                      <div class="form-group ssbtn" style="margin:-50px 0 20px 350px;">
				         <span class="input-group-btn">
                            <button type="submit" data-toggle='tooltip' title='Search'  name="ssbtn" class="btn btn-primary">Get Report</button>
                            <button type="submit" style="margin-left:10px;" onclick="divprint();" name="print" class="btn btn-primary print" >
                                <i class="icon-print">&nbsp;&nbsp;Print</i>
                            </button>
                            <button type="submit" style="margin-left:10px;" name="excel" class="btn btn-primary print" >
                                <i class="icon-list">&nbsp;&nbsp;Excel</i>
                            </button>
                         </span>
                     </div>
			</div>
		</div>
		</form>
	</div>
                    <?php if(isset($_REQUEST["ssbtn"]))
                    {include("page_content/printcontent.php");	?>
                       <div class="table-responsive">
                        <table id="example-datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>RollNO</th>
                                    <th >Name</th>
                                    <th>Marks</th>
                                </tr>
                            </thead>
                            <tbody>    
                            <?php
                                   // $x=mysql_fetch_object(mysql_query("select * from subject_tbl where subid=".$_REQUEST["subid"]));
                                    $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_sem_tbl inner join student_tbl where student_sem_tbl.studid = student_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_REQUEST["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'");   
                                    while($r1=mysql_fetch_object($r))
                                    { $con=mysql_fetch_object(mysql_query("select * from exam_tbl where exname='Practical'"));
                                    ?>

                                    <tr>
                                        <td><?= $r1->rollno;?></td>
                                        <td><?=  $r1->fname." ",$r1->lname;?></td>
                                        <?php
                                        $subb=mysql_fetch_object(mysql_query("select * from subject_tbl where sem=".$_REQUEST["sem"]." AND sname='Practical'"));
                                        $mr1=mysql_query("select * from exam_result_tbl where smid=$r1->smid AND exid=".$con->exid." AND subid=".$subb->subid);
                                        if(mysql_num_rows($mr1)<=0)
                                        {?>
                                          <td><b style="color:#B99663;">Pending...</b></td><?php }else{while($mr=mysql_fetch_object($mr1)){
                                        ?>
                                       <td><?= $mr->marks;?></td><?php }}?>
                                        <input type="hidden" name="smid[]" value='<?= $r1->smid?>'>
                                    </tr>
                                    <?php }}?>
                            </tbody>
				        </table>
                    </div>  
                
		</div>
<?php 
    include("page_content/listfooter.php");
?>