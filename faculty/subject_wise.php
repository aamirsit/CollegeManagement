<?php 
$table="faculty_tbl";
$pk="fid";
$nm="faculty";
$name="Subject Wise";
if(isset($_REQUEST["excel"]))
{
        echo "<script>location.href='excel-report/subjectwise_report.php?exid=".$_REQUEST['exid']."&subid=".$_REQUEST['subid']."';</script>";
}
include("page_content/listheader.php");
include("page_content/printheader.php");
?>
</ul>
	<div class="row gutter30">
		<div class="col-sm-3 col-sm-offset-1">
			<div class="block" style="border: none;box-shadow: none;margin:20px 0">
				<form method="post" id="form1" action="">
				    <div class="input-group">
						<span class="input-group-addon">Exam Name</span>
						<select name="exid" class="form-control">
							<?php
							$r=mysql_query("select * from exam_tbl where exname!='Practical'");
							while($r1=mysql_fetch_object($r)){?>
								<option value="<?= $r1->exid?>" <?php if(isset($_REQUEST["exid"])){if($r1->exid==$_REQUEST["exid"]){echo "selected";}}?>><?= $r1->exname ?></option>
							<?php }?>
						</select>
					</div>
					<div class="input-group" style="margin:-35px 0px 20px 354px;">
						<span class="input-group-addon">Subject Name</span>
						<select name="subid" class="form-control" style="width:200px;">
							<?php
							$r=mysql_query("select * from subject_tbl where sname!='Practical' AND sem=".$_SESSION["sem"]);
							while($r1=mysql_fetch_object($r)){?>
								<option value="<?= $r1->subid?>" <?php if(isset($_REQUEST["subid"])){if($r1->subid==$_REQUEST["subid"]){echo "selected";}}?>><?= $r1->sname ?></option>
							<?php }?>
						</select>
					</div>
			</div>
		</div>
				<div class="col-sm-3" style="margin:-1px 0px 20px 410px;">
					<div class="block" style="border: none;box-shadow: none;margin:20px 0">
						<div class="input-group">
							<input type="submit" name="sbtn" class="btn btn-primary" value="Get Report">
							<button type="submit" style="margin:-55px 0 0 110px;" onclick="divprint();" name="print" class="btn btn-primary print" >
                                <i class="icon-print">&nbsp;&nbsp;Print</i>
                            </button>
                            <button type="submit" style="margin:-91px 0 0 195px;" name="excel" class="btn btn-primary print" >
                                <i class="icon-list">&nbsp;&nbsp;Excel</i>
                            </button>
						</div>
						</form>
					</div>
				</div>
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
							$c=mysql_query("select * from subject_tbl where subid=".$_REQUEST["subid"]);
							$c1=mysql_fetch_object($c);?>
							<th class="text-center"><?= $c1->sname?></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $r=mysql_fetch_object(mysql_query("select * from subject_tbl where subid=".$_REQUEST["subid"]));
							$e=mysql_query("select student_tbl.*,student_sem_tbl.* from student_sem_tbl inner join student_tbl where student_tbl.studid=student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$r->sem." AND student_sem_tbl.year='".$_SESSION["year"]."'");
							while($e1=mysql_fetch_object($e)){?>

							<tr>
								<td class='text-center'><?= $e1->rollno;?></td>
								<td class='text-center'><?= $e1->fname." ".$e1->lname;?></td>
                               <?php 
                                $m1=mysql_fetch_object(mysql_query("select * from exam_result_tbl where exid=".$_REQUEST["exid"]." and smid=$e1->smid and subid=".$_REQUEST["subid"]));
                                if($m1!=null){$ex=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));       
                                    if($ex->exname=="Internal")
                                    {
                                        if($m1->marks<17){?>
                                        <td class="text-center" style="background-color:red;color:white;text-decoration:underline;"><?= $m1->marks;?></td>
                                        <?php 
                                    }else{?>
                                       <td class="text-center"><?= $m1->marks;?></td><?php  
                                    }
                                }else if ($ex->exname=="Performance"){?>
                                         <td class="text-center"><?= $m1->marks;?></td>
                                  <?php  }else{ if($m1->marks<7){?>
                                        <td class="text-center" style="background-color:red;color:white;text-decoration:underline;"><?= $m1->marks;?></td>
                                        <?php 
                                    }else{?>
                                       <td class="text-center"><?= $m1->marks;?></td><?php  
                                    }}}else{?>
                                <td class="text-center"><b style="color:#B99663;">Pending...</b></td></tr><?php 
                                }}
                            ?>
					</tbody>
				</table>
                <?php }?>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>