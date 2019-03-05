<?php 
$table="faculty_tbl";
$pk="fid";
$nm="faculty";
$name="Old Attendance";
if(isset($_REQUEST["excel"]))
{
            echo "<script>location.href='excel-report/atten_per_list_report.php?year=".$_REQUEST['year']."&sem=".$_REQUEST['sem']."';</script>";
}
include("page_content/listheader.php");
include("page_content/printheader.php");
?>
</ul>
	<div class="row gutter30">
		<div class="col-sm-3 col-sm-offset-2">
			<div class="block" style="border: none;box-shadow: none;margin:20px 0">
				<form method="post" id="form1" action="">
				<div class="form-group" style="margin-left:-50px;width:250px;">
					<div class="input-group">
							<span class="input-group-addon"><b>Select Year</b></span>
							<select class="form-control" name="year">
							    <?php 
                                    $y=mysql_query("select * from faculty_sem_tbl where fid=".$_SESSION["fid"]." group by year order by year");
                                    while($y1=mysql_fetch_object($y))
                                    {?>
                                       <option value="<?= $y1->year?>"><?= $y1->year?></option><?php 
                                    }
                                ?>
							</select>
				    </div>
                </div>
                <div class="form-group" style="margin:-50px 0 20px 250px;">
				    <div class="input-group">
							<span class="input-group-addon"><b>Select Sem</b></span>
							<select class="form-control" name="sem" style="width:100px;">
							    <?php 
                                    $y=mysql_query("select * from faculty_sem_tbl where fid=".$_SESSION["fid"]." group by sem order by sem");
                                    while($y1=mysql_fetch_object($y))
                                    {?>
                                       <option value="<?= $y1->sem?>" <?php if(isset($_REQUEST["sem"])){if($y1->sem==$_REQUEST["sem"]){echo "selected";}}?>><?= "SEM-".$y1->sem?></option><?php 
                                    }
                                ?>
							</select>
				    </div>
                </div>
                 <div class="form-group" style="margin:-55px 0 20px 500px;">
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
	   	include("page_content/attprintcontent.php");
            $i=mysql_fetch_object(mysql_query("select * from faculty_sem_tbl where fid=".$_SESSION["fid"]." AND year='".$_REQUEST["year"]."' AND sem=".$_REQUEST["sem"]));
            if($i)
            {
    ?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead class="text-center">
						<tr>
							<th class="text-center">RollNO</th>
							<th class="text-center">Name</th>
							<th class="text-center">Attendence</th>
							<th class="text-center">Percentage</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
							 $r=mysql_query("select student_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_sem_tbl.sem=".$_REQUEST["sem"]." AND student_sem_tbl.year='".$_REQUEST["year"]."'");
                                
							while($r1=mysql_fetch_object($r)){
                                //echo $r1->studid."-----";
                                $y=explode("-",$_SESSION["year"]);
                                $y1=mysql_query("select * from attendence_tbl where sem=".$_REQUEST["sem"]);
                                $k=0;
                                while($yy1=mysql_fetch_object($y1))
                                {
                                    $at=explode("-",$yy1->attenddate);
                                    if($at[0]==$y[0] || $at[0]==$y[1])
                                    {
                                        $attid[$k]=$yy1->attid;
                                        $k++;
                                    }
                                }
                                //echo "<script>alert($year);</script>";
                                $count=$k;
                                $c1=$count;
                                if($count>0){
                        ?>

							    <tr><td class='text-center'><a href="old_attendence_stud_list.php?studid=<?= $r1->studid?>&year=<?= $_REQUEST["year"]?>&sem=<?= $_REQUEST["sem"]?>"><?= $r1->rollno?></a></td>
								<td><?=  $r1->fname." ".$r1->lname?></td>
								<?php if(isset($attid)){?>
								<td>
								    <?php 
                                         $p=$c1;
                                        for($j=0;$j<count($attid);$j++)
                                        {
                                            $q=mysql_query("select * from attendence_tbl where attid=$attid[$j]");
                                            while($q1=mysql_fetch_object($q))
                                            {
                                                $stud=explode(",",$q1->studid);
                                                $s1="";

                                                for($i=0;$i<count($stud)-1;$i++)
                                                {
                                                    if($r1->studid == $stud[$i])
                                                    {
                                                        $c1--;
                                                    }
                                                }
                                            }
                                        }
                                echo $c1."/".$p; $per=(100*$c1)/$p;?>
								</td>
								<td><?php echo number_format((float)$per,2,'.','');?></td></tr>
			
							<?php } else "<td>No Entry</td><td>No Entry</td><tr>";	}}
							?>
					</tbody>
				</table>
				<?php }
                    else
                    echo "<center><b>Sorry :-(<br>You was not an incharge for the selected Year And Semister!</b></center>";
                } ?>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>                     