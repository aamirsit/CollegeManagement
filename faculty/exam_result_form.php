<?php 
$table="exam_result_tbl";
$pk="erid";
$nm="exam_result";
if(isset($_REQUEST["sbtn"])) {
include("DatabaseFiles/cn.php");
		if($_REQUEST["h2"]==""){

			$col=array($pk,'studid','exid','sub1','sub2','sub3','sub4','sub5');
			$val=array(null, $_REQUEST['studid'], $_REQUEST['exid'], $_REQUEST['sub1'], $_REQUEST['sub2'], $_REQUEST['sub3'], $_REQUEST['sub4'], $_REQUEST['sub5']);
			$db->insert($table, $col, $val);
			echo "<script>location.href='".$nm."_form.php'</script>";

		} else {
			$col=array($pk,'studid','exid','sub1','sub2','sub3','sub4','sub5');
			$val=array(null, $_REQUEST['studeid'], $_REQUEST['exid'], $_REQUEST['sub1'], $_REQUEST['sub2'], $_REQUEST['sub3'], $_REQUEST['sub4'], $_REQUEST['sub5']);
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
			echo "<script>location.href='".$nm."_list.php'</script>";
		}
	}
include("page_content/frmheader.php");	
	if(isset($_REQUEST["eid"]))	{
		$studid=$r->studid;
		$exid=$r->exid;
		$sub1=$r->sub1;
		$sub2=$r->sub2;
		$sub3=$r->sub3;
		$sub4=$r->sub4;
		$sub5=$r->sub5;
		$id=$r->$pk;
	}else{
		$studid= "";
		$exid= "";
		$sub1= "";
		$sub2= "";
		$sub3= "";
		$sub4= "";
		$sub5= "";
		$id="";
	}

?>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-user"></i></span>
							<input type="text" value="<?= $studid; ?>" id="example-username" name="studid" class="form-control" placeholder="Student Id" data-bvalidator="digit,required" data-bvalidator="digit,required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-envelope"></i></span>
							<input type="Text" value="<?= $exid; ?>" id="example-email" name="exid" class="form-control" placeholder="Exam Id" data-bvalidator="digit,required" data-bvalidator="digit,required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-asterisk"></i></span>
							<input type="text" value="<?= $sub1; ?>" id="example-password" name="sub1" class="form-control" placeholder="Subject 1" data-bvalidator="digit,required" data-bvalidator="required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-asterisk"></i></span>
							<input type="text" value="<?= $sub2; ?>" id="example-password" name="sub2" class="form-control" placeholder="Subject 2" data-bvalidator="digit,required" data-bvalidator="required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-asterisk"></i></span>
							<input type="text" value="<?= $sub3; ?>" id="example-password" name="sub3" class="form-control" placeholder="Subject 3" data-bvalidator="digit,required" data-bvalidator="required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-asterisk"></i></span>
							<input type="text" value="<?= $sub4; ?>" id="example-password" name="sub4" class="form-control" placeholder="Subject 4" data-bvalidator="digit,required" data-bvalidator="required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-asterisk"></i></span>
							<input type="text" value="<?= $sub5; ?>" id="example-password" name="sub5" class="form-control" placeholder="Subject 5" data-bvalidator="digit,required" 
							data-bvalidator="required">
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