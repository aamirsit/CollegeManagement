<?php include("DatabaseFiles/cn.php");
$table="exam_result_tbl";
$pk="erid";
$nm="exam_result";
if(isset($_REQUEST["sbtn"])) {

		if($_REQUEST["h2"]==""){

			$col=array($pk,'smid','exid','subid','marks');
			$val=array(null, $_REQUEST['smid'], $_REQUEST['exid'], $_REQUEST['subid'], $_REQUEST['marks']);
			$db->insert($table, $col, $val);
			echo "<script>location.href='".$nm."_form.php'</script>";

		} else {
			$col=array('smid','exid','subid','marks');
			$val=array($_REQUEST['smid'], $_REQUEST['exid'], $_REQUEST['subid'], $_REQUEST['marks']);
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
			echo "<script>location.href='".$nm."_list.php'</script>";
		}
	}
include("page_content/frmheader.php");	
	if(isset($_REQUEST["eid"]))	{
		$smid=$r->smid;
		$exid=$r->exid;
		$subid=$r->subid;
		$marks=$r->marks;
		$id=$r->$pk;
	}else{
		$smid="";
		$exid="";
		$subid="";
		$marks="";
		$id="";
	}

?>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Semester</span>
							<select name="smid" class="form-control">
							<?php
							$r=mysql_query('select * from student_sem_tbl group by sem,year');
							while($r1=mysql_fetch_object($r)){?>
								<option value="<?= $r1->smid?>"><?= $r1->sem?></option>
							<?php }?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Exam</span>
							<select name="exid" class="form-control">
							<?php
							$r=mysql_query('select * from exam_tbl');
							while($r1=mysql_fetch_object($r)){?>
								<option value="<?= $r1->exid?>"><?= $r1->exname?></option>
							<?php }?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Subject</span>
							<input type="text" value="<?= $subid; ?>" id="example-password" name="sub1" class="form-control" placeholder="Subject Id" data-bvalidator="digit,required" data-bvalidator="required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Marks</span>
							<input type="text" value="<?= $marks; ?>" id="example-password" name="sub2" class="form-control" placeholder="Marks" data-bvalidator="digit,required" data-bvalidator="required">
						</div>
					</div>
					<input type="hidden" value="<?= $id ?>" name="h2" placeholder="Last Name">
					<div class="form-group">
						<input type="submit" name="sbtn" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include("page_content/frmfooter.php");?>