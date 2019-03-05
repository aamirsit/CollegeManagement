<?php include("DatabaseFiles/cn.php");
$table="faculty_tbl";
$pk="fid";
$nm="Fail Students";
$name="Fail Students";
$n=0;
if(isset($_REQUEST["excel"]))
    {
        echo "<script>location.href='../faculty/excel-report/fail_report.php?exid=".$_REQUEST['exid']."&sem=".$_REQUEST['sem']."';</script>";
    }
include("page_content/listheader.php");
include("page_content/printheader.php");
?>
</ul>
	<div class="row gutter30">
    <form method="post" id="form1" action="">
		<div class="col-sm-3 col-sm-offset-2">
			<div class="block" style="border: none;box-shadow: none;margin:20px 0">
					<div class="input-group">
						<span class="input-group-addon">Exam Name</span>
						<select name="exid" class="form-control">
							<?php
							$r=mysql_query("select * from exam_tbl where exname!='Practical' AND exname!='Performance'");
							while($r1=mysql_fetch_object($r)){?>
								<option value="<?= $r1->exid?>" <?php if(isset($_REQUEST["exid"])){if($r1->exid==$_REQUEST["exid"]){echo "selected";}}?>><?= $r1->exname ?></option>
							<?php }?>
						</select>
					</div>
					<div class="input-group" style="margin:-35px 0 0 300px;width:200px;">
							<span class="input-group-addon"><b>Select SEM</b></span>
							<select name="sem" class="form-control"  >
							    <?php 
                                    $e=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' group by sem");
                                    while($e1=mysql_fetch_object($e))
                                    {if($e1->sem!=null && $e1->sem%2==0){
                                $flag++;
                            }}
                            if($flag!=0)
                            {   $e=mysql_query("select * from student_sem_tbl where year='".$year."' AND sem%2=0 group by year,sem");
                                 while($e1=mysql_fetch_object($e)){
                            ?>
                                <option value='<?= $e1->sem; ?>' <?php if(isset($_REQUEST["sem"])){if($_REQUEST["sem"]==$e1->sem){echo "SELECTED";}}?> >SEM-<?= $e1->sem; ?></option>
                                 <?php }}else{
                            $e=mysql_query("select * from student_sem_tbl where year='".$year."'group by year,sem");
                         while($e1=mysql_fetch_object($e)){
                            ?><option value='<?= $e1->sem; ?>' <?php if(isset($_REQUEST["sem"])){if($_REQUEST["sem"]==$e1->sem){echo "SELECTED";}}?> >SEM-<?= $e1->sem; ?></option><?php }}?>
							</select>
                        </div>
						<div class="input-group"  style="margin:-35px 0 0 550px;" >
							<input type="submit" name="sbtn" class="btn btn-primary" value="Get Report">
							<button type="submit" style="margin:-55px 0 0 110px;" onclick="divprint();" name="print" class="btn btn-primary print" >
                                <i class="icon-print">&nbsp;&nbsp;Print</i>
                            </button>
                            <button type="submit" style="margin:-91px 0 0 197px;" name="excel" class="btn btn-primary print" >
                                <i class="icon-list">&nbsp;&nbsp;Excel</i>
                            </button>
						</div>
					</div>
				</div>
                </form>
			</div>
	<?php if(isset($_REQUEST["sbtn"])) {
        include("page_content/printcontent.php");
		?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">Roll no</th>
							<th class="text-center">Name</th>
							<?php
                            $count=0;
							$c=mysql_query("select * from subject_tbl where sname!='Practical' AND sem=".$_REQUEST["sem"]." order by scode");
							while($c1=mysql_fetch_object($c)){
                            $subid[]=$c1->subid;
                            $count++;
                            ?>
							<th class="text-center"><?= $c1->sname?> </th>
							<?php }
                            ?>
							<th class="text-center">Total</th>
							<th class="text-center">Percentage</th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $fail1=0;
                            $key=0;
                             $total=0;
                            $c2=0;
							$e=mysql_query("select student_tbl.*,student_sem_tbl.* from student_sem_tbl inner join student_tbl where student_tbl.studid=student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_REQUEST["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'");
							while($e1=mysql_fetch_object($e)){
                                for($i=0;$i<$count;$i++)
                                        {   $m1=mysql_fetch_object(mysql_query("select * from exam_result_tbl where exid=".$_REQUEST["exid"]."      and smid=$e1->smid and subid=$subid[$i]"));
                                            $ex=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));       
                                            if($ex->exname=="Internal")
                                            { if($m1!=null)
                                                {$total=$total+$m1->marks;
                                                    if($m1->marks<17)
                                                    {
                                                        $fail1++;
                                                    } 
                                                }      
                                            }
                                            else
                                            {if($m1!=null)
                                                {$total=$total+$m1->marks;
                                                    if($m1->marks<7)
                                                    {
                                                        $fail1++;
                                                    } 
                                                }
                                            }
                                        }
                                //echo "<script>alert($fail1);</script>";
                                if($fail1!=0)
                                {
                                    $c2++;
                                    $roll[$key]=$e1->rollno;
                                    $totalmr[$key]=$total;
                                    $stud[$key]=$e1->smid;
                                    $studname[$key]=$e1->fname." ".$e1->lname;
                                    $key++;
                                }
                                $fail1=0;
                            }$key=0;
                           
                            for($j=0;$j<$c2;$j++)
                                {
                            ?>

							<tr>
								<td class='text-center'><?= $roll[$j];?></td>
								<td class='text-center'><?= $studname[$j];?></td>
				            <?php 
                                $total=0;
                                $per=0;
                                $fail=0;
                                $cc=0;
                                    for($i=0;$i<$count;$i++)
                                        {   $m=mysql_query("select * from exam_result_tbl where exid=".$_REQUEST["exid"]." and smid=$stud[$j] and     subid=$subid[$i]");
                                            while($m1=mysql_fetch_object($m))
                                            {
                                            $total=$total+$m1->marks;
                                            if($subid[$i]==$m1->subid)
                                            {   $ex=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));
                                                if($ex->exname=="Internal"){
                                                //echo $m1->subid." ".$subid[$i]; 
                                    ?>    
                                        <td class="text-center" <?php if($m1->marks<17){$fail++;?>style="text-decoration:underline;color:red"<?php }?> ><?= $m1->marks;?></td><?php }else{?> <td class="text-center" <?php if($m1->marks<7){$fail++;?>style="text-decoration:underline;color:red"<?php }?> ><?= $m1->marks;?></td><?php } 
                                }}if(mysql_num_rows($m)<=0){ $cc++;?><td class='text-center' style="color:#B99663;">Pending...</td><?php }}
                                if($cc==0){
                            ?><td class="text-center"><?= $total?></td><td class="text-center" <?php if($fail!=0){?>style="background-color:red;text-decoration:underline;color:white"<?php }?>>
                               <?php
                                $rr=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));
                                if($_REQUEST["sem"]==6)
                                {
                                    $per=$total*100/2/$rr->marks;
                                }
                                else
                                {
                                    $per=$total*100/5/$rr->marks;
                                }
                                echo round($per)."%";
                                ?></td></tr>
							<?php 
                            }else{ echo "<td class='text-center' style='color:#B99663;'>Pending...</td>"; echo "<td class='text-center' style='color:#B99663;'>Pending...</td>"; }}
							?>
					</tbody>
				</table>
				<?php } ?>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>