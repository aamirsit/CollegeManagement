<?php include("DatabaseFiles/cn.php");
$table="faculty_tbl";
$pk="fid";
$nm="Sem";
$n=0;
if(isset($_REQUEST["sbtn"])) {

            if($_REQUEST['oldsem']=="")
            {
                (string)$year=$_SESSION['year'];
                $col=array('fsid','year','sem','fid');
			    $val=array(null,$year,$_REQUEST['sem'],$_REQUEST['fid']);
                //echo "--------------".$_REQUEST['sem']."  ".$_SESSION['year']."   ".$_REQUEST['sem']."     ".$_REQUEST['fid'];
                $db->insert('faculty_sem_tbl',$col,$val);
                echo "<script>location.href='index.php?al'</script>";
            }
            else
            {
                
            }
			$col=array('sem','fid');
			$val=array($_REQUEST['sem'],$_REQUEST['fid']);
			$db->update('faculty_sem_tbl','fsid',$_REQUEST["fsid"],$col, $val);
			echo "<script>location.href='index.php?al'</script>";
	}
include("page_content/frmheader.php");	
	if(isset($_REQUEST["fid"]))	{
		$fid=$_REQUEST["fid"];
		$sem=$_REQUEST["sem"];
	}
    if(isset($_REQUEST['eid'])){
        $fid=$_REQUEST["eid"];
        $sem="";
    }

?>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Sem &nbsp;&nbsp;&nbsp;&nbsp;</span>
							<select name="sem" class="form-control">
							    <?php 
                                    $s=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' group by sem");
                                    if($s)
                                    {
                                        while($ss=mysql_fetch_object($s))
                                        {?>
                                           <option value="<?= $ss->sem?>" <?php if($ss->sem==$sem){echo "selected";}?>>SEM-<?=$ss->sem?></option> 
                                        <?php }
                                    }
                                ?>
							</select>
						</div>
					</div>
					<div class="input-group">
							<span class="input-group-addon">Faculty</span>
							<select name="fid" class="form-control">
							<?php
							$t=mysql_query("select * from faculty_tbl");
							while($t1=mysql_fetch_object($t)){ ?>
								<option value="<?= $t1->fid?>" <?php if($fid==$t1->fid){ echo "SELECTED";}?>><?= $t1->fname." ".$t1->lname?></option>
							<?php }?>
							</select>
						</div>
					<div class="form-group">
					    <input type="hidden" name="oldsem" value="<?= $sem?>">
						<input type="submit" name="sbtn" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include("page_content/frmfooter.php");
?>