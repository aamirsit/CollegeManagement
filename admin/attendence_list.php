<?php include("DatabaseFiles/cn.php");
$table="attendence_tbl";
$pk="attid";
$nm="Overall Attendance"; 
$name="Overall Attendance";
$n=0;
$sem=$_REQUEST["sem"];
if(isset($_REQUEST["did"])) {
        $r=mysql_fetch_object(mysql_query("select * from attendence_tbl where attid='".$_REQUEST["did"]."'"));
        $col=array($pk,'studid','attenddate','fid','sem');
        $val=array($_REQUEST["did"],null,$r->attenddate,$_SESSION["lid"],$_REQUEST["sem"]);
        $db->update($table,$pk,$_REQUEST["did"], $col, $val);
        echo "<script>location.href='attendence_list.php?sem=$sem'</script>";
}
include("page_content/listheader.php");
?>
       <li class=""><a href="attendence_form.php"><i class="icon-reply"></i><b>&nbsp;&nbsp;&nbsp;&nbsp;Back</b></a></li>
			</ul>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead class="text-center">
						<tr>
							<th class="text-center">RollNO</th>
							<th class="text-center">Attendence Date</th>
							<?php if(!isset($_REQUEST["ovrs"])){?><th class="text-center">Actions</th><?php }?>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
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
                                    $roll=mysql_fetch_object(mysql_query("select * from student_tbl where isdetend=0 AND isleave=0 AND studid='".$stud[$i]."'"));
                                    if($roll)
                                    {
                                        $s1.=$roll->rollno.",";
                                    }
                                }
                        ?>

							<tr>
								<td><?php if($s1!=""){echo substr($s1,0,100)."<br>".substr($s1,100);}else{ echo "All Present";}?></td>
								<td><?=  $r1->attenddate;?></td>
								<?php if(!isset($_REQUEST["ovrs"])){?><td class="text-center"><a href='attendence_form.php?sem=<?= $_REQUEST["sem"]?>&eid=<?= $r1->$pk?>' data-toggle='tooltip' title='Edit' class='btn btn-xs btn-default'><i class='icon-pencil'></i></a><a href='?sem=<?= $_REQUEST["sem"]?>&did=<?= $r1->$pk?>' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-default'><i class='icon-remove'></i></a></td><?php }?></tr>
			
							<?php 	}}}
							?>
					</tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Attendance Updated!','success');});</script>";
}
?>