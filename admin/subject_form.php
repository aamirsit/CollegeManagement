<?php include("DatabaseFiles/cn.php");
$table="subject_tbl";
$pk="subid";
$nm="subject";
$n="12";
if(isset($_REQUEST["sbtn"])) {

		if($_REQUEST["h2"]==""){
			$col=array($pk,'scode','sname','sem');
			$val=array(null, $_REQUEST['scode'], $_REQUEST['sname'], $_REQUEST['sem']);
			$db->insert($table, $col, $val);
			echo "<script>location.href='".$nm."_form.php?success'</script>";

		} else
        {
            if(isset($_REQUEST["aid"]))
            {
                $col=array('scode','sname','sem','fid');
                $val=array($_REQUEST['scode'] , $_REQUEST['sname'] , $_REQUEST['sem'] , $_REQUEST['fid']);
                $db->update($table,$pk,$_REQUEST['h2'], $col, $val);
                echo "<script>location.href='".$nm."_list.php?success'</script>";
            }
            if(isset($_REQUEST["eid"]))
            {
                $col=array('scode','sname','sem');
                $val=array($_REQUEST['scode'], $_REQUEST['sname'], $_REQUEST['sem']);
                $db->update($table,$pk,$_REQUEST["h2"], $col, $val);
                echo "<script>location.href='".$nm."_list.php?success'</script>";
            }
        }
	}
include("page_content/frmheader.php");	
	if(isset($_REQUEST["eid"]))	{
		$r=mysql_fetch_object(mysql_query("select * from $table where $pk='".$_REQUEST["eid"]."'"));
		$scode=$r->scode;
		$sname=$r->sname;
		$sem=$r->sem;
		$id=$r->$pk;
	}else if(isset($_REQUEST["aid"])){
		$r=mysql_fetch_object(mysql_query("select * from $table where $pk='".$_REQUEST["aid"]."'"));
		$scode=$r->scode;
		$sname=$r->sname;
		$sem=$r->sem;
		$fid=$r->fid;
		$id=$r->$pk;
	}else{
		$scode= "";
		$sname= "";
		$sem= "";
		$fid= "";
		$id="";
	}

?>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Subject Code</span>
							<input type="text" data-bvalidator="digit,minlength[3],maxlength[3],required" value="<?= $scode; ?>" id="example-username" name="scode" class="form-control" placeholder="Subject Code">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Subject Name</span>
							<input type="Text" data-bvalidator="alphanum,required" value="<?= $sname; ?>" id="example-email" name="sname" class="form-control" placeholder="Subject Name">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Semester</span>
							<select class="form-control" name="sem">
							    <?php 
                                    for($i=1;$i<7;$i++){
                                ?>
								<option value="<?=$i?>" <?php if((isset($_REQUEST["eid"]) || isset($_REQUEST["aid"])) && $sem==$i){echo "Selected";}?>>SEM <?=$i?></option><?php }?>
							</select>
				        </div>
					</div>
					<?php 
                    if(isset($_REQUEST["aid"])){?>
					<div class="form-group" id="fid">
						<div class="input-group">
							<span class="input-group-addon">Faculty</span>
							<select class="form-control" name="fid">
							<?php 
                                $f=mysql_query("select * from faculty_tbl where fid!=1");
                                while($f1=mysql_fetch_object($f)){
                            ?>
								<option value="<?= $f1->fid;?>" <?php if(isset($_REQUEST["aid"]) && $f1->fid==$fid){echo "Selected";}?>><?= $f1->fname." ".$f1->lname;?></option>
                           <?php }?>
                            </select>
						</div>
					</div><?php }?>
					<input type="hidden" value="<?= $id ?>" name="h2">
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
    echo "<script>$(document).ready(function(){ pops('Subject Added Successfully!','success');});</script>";
}
?>