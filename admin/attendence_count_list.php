<?php include("DatabaseFiles/cn.php");
$table="attendence_tbl";
$pk="attid";
$nm="Percentage Wise Attendence"; 
$name="Percentage Wise";
$n=0;
include("page_content/listheader.php");
?>
<li class=""><a href="attendence_form.php"><i class="icon-reply"></i><b>&nbsp;&nbsp;&nbsp;&nbsp;Back</b></a></li>
			</ul>
     
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
					<tbody>
						<?php 
							 $r=mysql_query("select student_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_REQUEST["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'");
                                
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
                        ?>

							    <tr><td class='text-center'><a href="attendence_stud_list.php?sem=<?= $_REQUEST["sem"]?>&studid=<?= $r1->studid?>"><?= $r1->rollno?></a></td>
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
                                echo $c1."/".$p; if($p!=0){ $per=(100*$c1)/$p;}else {$per=0;}?>
								</td>
								<td><?php echo number_format((float)$per,2,'.','');?></td></tr>
			
							<?php }else echo "<td>No Entry</td><td>No Entry</td><tr>";	}
							?>
					</tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>