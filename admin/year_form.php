<?php include("DatabaseFiles/cn.php");
$table="year_tbl";
$pk="yid";
$nm="year";
$n="3";
if(isset($_REQUEST["sbtn"])) {

		if($_REQUEST["h2"]==""){

			$col=array($pk,'year');
			$val=array(null, $_REQUEST['year']);
			$db->insert($table, $col, $val);
            
            $_SESSION["year"]=$_REQUEST['year'];
			echo "<script>location.href='".$nm."_form.php?success'</script>";

		} else {
			$col=array('year');
			$val=array($_REQUEST['year']);
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
			echo "<script>location.href='".$nm."_list.php?success'</script>";
		}
	}
include("page_content/frmheader.php");	
	if(isset($_REQUEST["eid"]))	{
        $r=mysql_fetch_object(mysql_query("select * from $table where $pk=".$_REQUEST["eid"]));
		$year=$r->year;
		$id=$r->$pk;
	}else{
		$year="";
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
							<input type="text" data-bvalidator="maxlength[9],required" value="<?= $year; ?>" id="example-username" name="year" class="form-control" placeholder="20**-20**">
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
    echo "<script>$(document).ready(function(){ pops('New Year Inserted!','success');});</script>";
}
?>