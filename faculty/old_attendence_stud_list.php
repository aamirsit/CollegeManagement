<?php 
$table="attendence_tbl";
$pk="attid";
$nm="Particular Student"; 
$name="Particular Student old";
if(isset($_REQUEST["excel"]))
    {
            echo "<script>location.href='excel-report/attendance_studlist_report.php?year=".$_REQUEST['year']."&studid=".$_REQUEST['studid']."&sem=".$_REQUEST['sem']."';</script>";
    }
include("page_content/listheader.php");
include("page_content/printheader.php");
?>
            <li class=""><a href="old_attendence_frmlist.php"><i class="icon-reply"></i><b>&nbsp;&nbsp;&nbsp;&nbsp;Back</b></a></li>
</ul>
			<div class="row">
			        <div class="col-md-6">
			    <?php 
                    $s=mysql_query("select * from student_tbl where studid=".$_REQUEST["studid"]);
                    $s1=mysql_fetch_object($s);
                ?>
                <h3 style="color:#B99663;line-height:40px;">Rollno:- <?= $s1->rollno.". "?> &nbsp;Name:- <?=$s1->fname." ".$s1->lname."."?></h3>
                </div>
			    <div class="col-md-6" style="padding-top:40px;">
                   <form method="post">
                    <input type="hidden" value="<?= $_REQUEST['sem']?>" name="sem">
                    <input type="hidden" value="<?= $_REQUEST['year']?>" name="max">
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
							<th class="text-center">Attendence Date</th>
							<th class="text-center">Attendence</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
                            $y=explode("-",$_REQUEST["year"]);
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
                                for($j=0;$j<count($attid);$j++)
                                    {
                                        $r=mysql_query("select * from attendence_tbl where attid=$attid[$j]");
                                         while($r1=mysql_fetch_object($r))
                                         {
                                            $stud=explode(",",$r1->studid);
                                            $flag=0;
                                            $col="";
                                            for($i=0;$i<count($stud)-1;$i++)
                                            {
                                                if($_REQUEST['studid'] == $stud[$i])
                                                {
                                                    $flag=1;
                                                    break;
                                                }
                                                else
                                                {
                                                    $flag=0;
                                                }
                                            }
                                            if($flag==1)
                                            {?>
                                               <tr>
                                               <?php 
                                                $pre="Absent";
                                                $col="rgb(255,0,0)";
                                                $col1="white";
                                            }
                                            elseif($flag==0)
                                            {?>
                                               <tr><?php 
                                                $pre="Present";
                                                $col1="Black";
                                            }?>

                                               <td class="text-center"><?= $r1->attenddate?></td>
                                                <td class="text-center" style="background-color:<?=$col?>;color:<?=$col1?>;"><?= $pre?></td>
                                               <?php
                                         }
                                     }
                                //echo "<script>alert($year);</script>";
                                
                        ?>
                        </tr>
					</tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>