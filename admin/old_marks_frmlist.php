<?php include("DatabaseFiles/cn.php");
$table="faculty_tbl";
$pk="fid";
$nm="Old Marks";
$name="Old Marks";
$n=0;
if(isset($_REQUEST["excel"]))
    {
        echo "<script>location.href='../faculty/excel-report/semwise_report.php?year=".$_REQUEST['year']."&exid=".$_REQUEST['exid']."&sem=".$_REQUEST['sem']."';</script>";
    }
include("page_content/listheader.php");
include("page_content/printheader.php");
?>
</ul>
	<div class="row gutter30">
		<div class="col-sm-3 col-sm-offset-2">
			<div class="block" style="border: none;box-shadow: none;margin:20px 0">
				<form method="post" id="form1" action="">
				<div class="form-group" style="margin-left:-100px;width:250px;">
					<div class="input-group">
							<span class="input-group-addon"><b>Select Year</b></span>
							<select class="form-control" name="year">
							    <?php 
                                    $y=mysql_query("select * from year_tbl");
                                    while($y1=mysql_fetch_object($y))
                                    {?>
                                       <option value="<?= $y1->year?>" <?php if(isset($_REQUEST["year"])){if($y1->year==$_REQUEST["year"]){echo "selected";}}?>><?= $y1->year?></option><?php 
                                    }
                                ?>
							</select>
				    </div>
                </div>
                <div class="form-group" style="margin:-50px 0 20px 200px;">
				    <div class="input-group">
							<span class="input-group-addon"><b>Select Sem</b></span>
							<select class="form-control" name="sem" style="width:100px;">
							    <?php 
                                    for($i=1;$i<=6;$i++)
                                    {?>
                                       <option value="<?= $i?>" <?php if(isset($_REQUEST["sem"])){if($i==$_REQUEST["sem"]){echo "selected";}}?>><?= "SEM-".$i?></option><?php 
                                    }
                                ?>
							</select>
				    </div>
                </div>
                <div class="form-group" style="margin:-55px 0 20px 450px;width:200px;">
					<div class="input-group">
							<span class="input-group-addon"><b>Select Exam</b></span>
							<select class="form-control" name="exid">
							    <?php 
                                    $ex=mysql_query("select * from exam_tbl where exname!='Practical'");
                                    while($ex1=mysql_fetch_object($ex))
                                    {?>
                                       <option value="<?= $ex1->exid?>" <?php if(isset($_REQUEST["exid"])){if($ex1->exid==$_REQUEST["exid"]){echo "selected";}}?>><?= $ex1->exname?></option><?php 
                                    }
                                ?>
							</select>
				    </div>
                </div>
                 <div class="form-group" style="margin:-55px 0 20px 700px;">
						<div class="input-group">
							<input type="submit" name="sbtn" class="btn btn-primary" value="Get Report">
							<button type="submit" style="margin:-55px 0 0 110px;" onclick="divprint();" name="print" class="btn btn-primary print" >
                                <i class="icon-print">&nbsp;&nbsp;Print</i>
                            </button>
                            <button type="submit" style="margin:-92px 0 0 195px;" name="excel" class="btn btn-primary print" >
                                <i class="icon-list">&nbsp;&nbsp;Excel</i>
                            </button>
						</div>
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
							$e=mysql_query("select student_tbl.*,student_sem_tbl.* from student_sem_tbl inner join student_tbl where student_tbl.studid=student_sem_tbl.studid AND student_sem_tbl.sem=".$_REQUEST["sem"]." AND student_sem_tbl.year='".$_REQUEST["year"]."'");
							while($e1=mysql_fetch_object($e)){?>

							<tr>
								<td class='text-center'><?= $e1->rollno;?></td>
								<td class='text-center'><?= $e1->fname." ".$e1->lname;?></td>
				            <?php 
                                $total=0;
                                $per=0;
                                $fail=0;
                                $cc=0;
                                    for($i=0;$i<$count;$i++)
                                        {   $m=mysql_query("select * from exam_result_tbl where exid=".$_REQUEST["exid"]." and smid=$e1->smid and  subid=$subid[$i]");
                                            while($m1=mysql_fetch_object($m))
                                            {
                                            $total=$total+$m1->marks;
                                            if($subid[$i]==$m1->subid)
                                            {  $ex=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));
                                                if($ex->exname=="Internal"){
                                                //echo $m1->subid." ".$subid[$i]; 
                                    ?>    
                                        <td class="text-center" <?php if($m1->marks<17){$fail++;?>style="text-decoration:underline;color:red"<?php }?> ><?= $m1->marks;?></td><?php }else if($ex->exname=="Performance"){?> <td class="text-center"><?= $m1->marks;?></td><?php }else{?> <td class="text-center" <?php if($m1->marks<7){$fail++;?>style="text-decoration:underline;color:red"<?php }?> ><?= $m1->marks;?></td><?php } 
                                }}if(mysql_num_rows($m)<=0){ $cc++;?><td class='text-center' style="color:#B99663;">Pending...</td><?php }}
                                if($cc==0){
                            ?><td class="text-center"><?= $total?></td><td class="text-center" <?php if($fail!=0){?>style="text-decoration:underline;background-color:red;color:white"<?php }?>>
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
							<?php 	}else{ echo "<td class='text-center' style='color:#B99663;'>Pending...</td>"; echo "<td class='text-center' style='color:#B99663;'>Pending...</td>"; }}
							?>
					</tbody>
				</table>
				<?php  } ?>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>                     