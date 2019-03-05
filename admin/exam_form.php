<?php include("DatabaseFiles/cn.php");
$table="exam_tbl";
$pk="exid";
$nm="exam";
$n=0;
if(isset($_REQUEST["sbtn"])) {

		if($_REQUEST["h2"]==""){

			$col=array($pk,'exname','marks');
			$val=array(null, $_REQUEST['exname'],$_REQUEST['marks']);
			$db->insert($table, $col, $val);
			echo "<script>location.href='".$nm."_form.php?success'</script>";

		} else {
			$col=array('exname','marks');
			$val=array( $_REQUEST['exname'],$_REQUEST['marks']);
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
			echo "<script>location.href='".$nm."_list.php?success'</script>";
		}
	}
include("page_content/frmheader.php");	
	if(isset($_REQUEST["eid"]))	{
        $r=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST['eid']));
		$exam=$r->exname;
        $marks=$r->marks;
		$id=$r->$pk;
	}else{
		$exam="";
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
							<span class="input-group-addon">Exam</span>
							<input type="text" value="<?= $exam; ?>" id="example-username" name="exname" class="form-control" placeholder="Exam" data-bvalidator="required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Marks</span>
							<input type="text" value="<?= $marks; ?>" id="example-username" name="marks" class="form-control" placeholder="Total Marks" data-bvalidator="digit,required,min[5]">
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
</div>
<?php include("page_content/frmfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Exam Inserted Successfully!','success');});</script>";
}
?>