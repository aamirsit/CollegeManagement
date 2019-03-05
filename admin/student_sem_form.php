<?php include("DatabaseFiles/cn.php");
$table="student_sem_tbl";
$pk="smid";
$nm="student_sem";
if(isset($_REQUEST["sbtn"])) {

		if($_REQUEST["h2"]==""){

			$col=array($pk,'studid','year','sem');
			$val=array(null, $_REQUEST['studid'], $_REQUEST['year'], $_REQUEST['sem']);
			$db->insert($table, $col, $val);
			echo "<script>location.href='".$nm."_form.php'</script>";

		} else {
			$col=array('studid','year','sem');
			$val=array($_REQUEST['studid'], $_REQUEST['year'], $_REQUEST['sem']);
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
			echo "<script>location.href='".$nm."_list.php'</script>";
		}
	}
include("page_content/frmheader.php");	
	if(isset($_REQUEST["eid"]))	{
		$studid=$r->studid;
		$year=$r->year;
		$sem=$r->sem;
		$id=$r->$pk;
	}else{
		$studid="";
		$year="";
		$sem="";
		$id="";
	}

?>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Student </span>
							<input type="text" data-bvalidator="digit,required" value="<?= $studid; ?>" id="example-username" name="studid" class="form-control" placeholder="Student Id">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Year</i></span>
							<input type="Text" data-bvalidator="digit,minlength[4],maxlength[4],required" value="<?= $year; ?>" id="example-email" name="year" class="form-control" placeholder="Year">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Semester</span>
							<input type="text" data-bvalidator="between[1:6],required" value="<?= $sem; ?>" id="example-password" name="sem" class="form-control" placeholder="semister">
						</div>
					</div>
					<input type="hidden" value="<?= $id ?>" name="h2">
					<div class="form-group">
						<input type="submit" name="sbtn" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include("page_content/frmfooter.php");?>