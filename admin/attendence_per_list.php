<?php include("DatabaseFiles/cn.php");
$table="attendence_tbl";
$pk="attid";
$nm="Overall Attendance"; 
$name="Between Date Attendance";
$n=0;
if(isset($_REQUEST["excel"]))
    {
            echo "<script>location.href='../faculty/excel-report/attendance_studlist1_report.php?sem=".$_REQUEST['sem']."&min=".$_REQUEST['min']."&max=".$_REQUEST['max']."';</script>";
    }
include("page_content/listheader.php");
include("page_content/printheader.php");
?>			</ul>
               <div class="row">
                <div class="col-md-6">
			     <h3 style="color:#B99663;line-height:40px;"><?php if(isset($_REQUEST["min"])){echo "Between:- ".$_REQUEST["min"]." to ".$_REQUEST["max"].".";}?></h3>
			    </div>
			    <div class="col-md-6" style="padding-top:40px;">
                   <form method="post">
                    <input type="hidden" value="<?= $_REQUEST['sem']?>" name="sem">
                    <?php if(isset($_REQUEST['min'])){?>
                    <input type="hidden" value="<?= $_REQUEST['min']?>" name="min">
                    <input type="hidden" value="<?= $_REQUEST['max']?>" name="max">
                    <?php }?>
                    <button type="submit" style="margin:0 0 0 10px;" name="excel" class="btn btn-primary pull-right print" >
                        <i class="icon-list">&nbsp;&nbsp;Excel</i>
                    </button>
                       
                    <button type="submit" style="" onclick="divprint();" name="print" class="btn btn-primary pull-right print" >
                        <i class="icon-print">&nbsp;&nbsp;Print</i>
                    </button>
                    </form>
                </div>
                </div>
                <?php include("page_content/attprintcontent.php");?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead class="text-center">
						<tr>
							<th class="text-center">RollNO</th>
                            <th class="text-center">Attendence Date</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
							$y=explode("-",$_SESSION["year"]);
                                $min=$_REQUEST["min"];
                                $max=$_REQUEST["max"];
                                $y1=mysql_query("select * from attendence_tbl where sem=".$_REQUEST["sem"]." AND attenddate  between '$min' AND '$max'");
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
                            if(isset($attid)){
                            for($j=0;$j<count($attid);$j++)
                            { $r=mysql_query("select * from attendence_tbl where attid=$attid[$j]");
							while($r1=mysql_fetch_object($r)){
                                //echo $r1->studid."-----";
                                $stud=explode(",",$r1->studid);
                                $s1="";
                                //echo "<pre>";print_r($stud);
                                for($i=0;$i<count($stud)-1;$i++)
                                {
                                    $roll=mysql_fetch_object(mysql_query("select * from student_tbl where isdetend=0 AND isleave=0 AND  studid='".$stud[$i]."'"));
                                    if($roll)
                                    {    
                                        $s1.=$roll->rollno.",";
                                    }
                                }
                        ?>

							<tr>
								<td><?php if($s1!=""){echo substr($s1,0,100)."<br>".substr($s1,100);}else{ echo "All Present";}?></td>
								<td><?=  $r1->attenddate;?></td>
				            </tr>
			
							<?php 	}}}
							?>
                    </tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>