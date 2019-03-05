<?php 
$table="faculty_tbl";
$pk="fid";
$nm="faculty";
$name="Exam Report";
include("page_content/listheader.php");
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
							$r=mysql_query("select * from exam_tbl where exname!='Performance' AND exname!='Practical'");
							while($r1=mysql_fetch_object($r)){?>
								<option value="<?= $r1->exid?>" <?php if(isset($_REQUEST["exid"])){if($r1->exid==$_REQUEST["exid"]){echo "selected";}}?>><?= $r1->exname ?></option>
							<?php }?>
						</select>
					</div>
			</div>
		</div>
				<div class="col-sm-3">
					<div class="block" style="border: none;box-shadow: none;margin:20px 0">
						<div class="input-group">
							<input type="submit" name="sbtn" class="btn btn-primary" value="Get Report">
						</div>
					</div>
				</div>
                </form>
			</div>
	<?php if(isset($_REQUEST["sbtn"])) {
		?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">Roll no</th>
							<th class="text-center">Name</th>
							<?php
                            $count=0;
							$c=mysql_query("select * from subject_tbl where sname!='Practical' AND  sem=".$_SESSION["sem"]." order by scode");
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
							$e=mysql_query("select student_tbl.*,student_sem_tbl.* from student_sem_tbl inner join student_tbl where student_tbl.studid=student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_SESSION["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'");
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
                                        {   $m=mysql_query("select * from exam_result_tbl where exid=".$_REQUEST["exid"]." and smid=$e1->smid and subid=$subid[$i]");
                                            while($m1=mysql_fetch_object($m))
                                            {
                                            $total=$total+$m1->marks;
                                            if($subid[$i]==$m1->subid)
                                            {   $ex=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));
                                                if($ex->exname=="Internal"){
                                                //echo $m1->subid." ".$subid[$i]; 
                                    ?>    
                                        <td class="text-center" <?php if($m1->marks<17){$fail++;?>style="color:red"<?php }?> ><?= $m1->marks;?></td><?php }else{?> <td class="text-center" <?php if($m1->marks<7){$fail++;?>style="color:red"<?php }?> ><?= $m1->marks;?></td><?php } 
                                }}if(mysql_num_rows($m)<=0){ $cc++;?><td class='text-center' style="color:orange;">Pending...</td><?php }}
                                if($cc==0){
                            ?><td class="text-center"><?= $total?></td><td class="text-center" <?php if($fail!=0){?>style="background-color:red;color:white"<?php }?>>
                               <?php
                                $rr=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));
                                if($_SESSION["sem"]==6)
                                {
                                    $per=$total*100/2/$rr->marks;
                                }
                                else
                                {
                                    $per=$total*100/5/$rr->marks;
                                }
                                echo round($per)."%";
                                ?></td></tr>
							<?php 	}else{ echo "<td class='text-center' style='color:orange;'>Pending...</td>"; echo "<td class='text-center' style='color:orange;'>Pending...</td>"; }}
							?>
					</tbody>
				</table>
				<?php } ?>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>