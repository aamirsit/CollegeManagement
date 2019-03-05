<?php 
$table="attendence_tbl";
$pk="attid";
$nm="Percentage Wise Attendence"; 
$name="Percentage Wise";
if(isset($_REQUEST["excel"]))
    {
            echo "<script>location.href='excel-report/atten_per_list_report.php?sem=".$_REQUEST['sem']."';</script>";
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
                                    { if($e1->sem!=null && $e1->sem%2==0){
                                $flag++;
                            }}
                            if($flag!=0)
                            {   $e=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' AND sem%2=0 group by year,sem");
                                 while($e1=mysql_fetch_object($e)){
                            ?>
                                <option value='<?= $e1->sem; ?>' <?php if(isset($_REQUEST["sem"])){if($_REQUEST["sem"]==$e1->sem){echo "SELECTED";}}?> >SEM-<?= $e1->sem; ?></option>
                                <?php }}else{
                            $e=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."'group by year,sem");
                         while($e1=mysql_fetch_object($e)){
                            ?><option value='<?= $e1->sem; ?>' <?php if(isset($_REQUEST["sem"])){if($_REQUEST["sem"]==$e1->sem){echo "SELECTED";}}?> >SEM-<?= $e1->sem; ?></option><?php }}?>
							</select>
                        </div>
                    </div>
                      <div class="form-group ssbtn" style="margin:-50px 0 20px 350px;">
				         <span class="input-group-btn">
                            <button type="submit" data-toggle='tooltip' title='Search'  name="ssbtn" class="btn btn-primary">Get Report</button>
                            <button type="submit" style="margin:0 0 0 10px;" onclick="divprint();" name="print" class="btn btn-primary print" >
                                <i class="icon-print">&nbsp;&nbsp;Print</i>
                            </button>
                            <button type="submit" style="margin:0 0 0 10px;" name="excel" class="btn btn-primary print" >
                                <i class="icon-list">&nbsp;&nbsp;Excel</i>
                            </button>
                         </span>
                     </div>
			</div>
		</div>
		</form>
	</div>
                    <?php if(isset($_REQUEST["ssbtn"]))
                    {include("page_content/attprintcontent.php");?>
     
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
							 $r=mysql_query("select student_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0  AND student_sem_tbl.sem=".$_REQUEST["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'");
                                
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
                                if($count>0)
                                {
                        ?>

							    <tr><td class='text-center'><a href="attendence_stud_list_rep.php?studid=<?= $r1->studid?>&sem=<?= $_REQUEST["sem"]?>"><?= $r1->rollno?></a></td>
								<td><?=  $r1->fname." ".$r1->lname?></td>
								<td>
								    <?php if(isset($attid)){
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
                                echo $c1."/".$p; if($p!=0){ $per=(100*$c1)/$p;}else {$per=0;}?>
								</td>
								<td><?php echo number_format((float)$per,2,'.','');?></td></tr>
			
							<?php }else "<td>No Entry</td><td>No Entry</td></tr>";	}}
							?>
					</tbody>
				</table>
			</div><?php }?>
</div>
<?php include("page_content/listfooter.php");?>