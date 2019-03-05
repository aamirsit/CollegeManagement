
<?php 
$table="gd_topic_tbl";
$pk="gdtid";
$nm="add_topic";
$t="Add Topic";
$name="Add / Update Topic";
date_default_timezone_set("Asia/Kolkata");
if(isset($_REQUEST["sbtn"])) {

include("DatabaseFiles/cn.php");
		if($_REQUEST["h2"]==""){

			$col=array($pk,'fid','topic','gdtdate');
			$val=array(null,$_SESSION["fid"],$_REQUEST['topic'],date('Y-m-d h:i:s A'));
			$db->insert($table, $col, $val);
			echo "<script>location.href='".$nm."_form.php?success'</script>";

		} else {
			$col=array('fid','topic','gdtdate');
			$val=array($_SESSION["fid"],$_REQUEST['topic'],date('Y-m-d h:i:s A'));
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
			echo "<script>location.href='".$nm."_form.php?upd'</script>";
		}
	}
include("page_content/frmheader.php");
    if(isset($_REQUEST["did"])) {
		$db->delete($table,$pk,$_REQUEST["did"]);
		echo "<script>location.href='".$nm."_form.php?dell'</script>";
	}
	if(isset($_REQUEST["eid"]))	{
        $r=mysql_fetch_object(mysql_query("select * from gd_topic_tbl where gdtid=".$_REQUEST["eid"]));
		$topic=$r->topic;
		$id=$r->$pk;
        $t="Update Topic";
	}else{
		$topic="";
		$id="";
	}

?>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><b><?= $t?></b></span>
							<input type="text" value="<?= $topic; ?>" id="example-username" name="topic" class="form-control" placeholder="Topic" data-bvalidator="required">
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
    <div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead class="text-center">
						<tr>
							<th class="text-center">Topic</th>
							<th class="text-center">Added By</th>
							<th class="text-center">Date & Time</th>
                            <th class="text-center">Total Comments</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
							$r=mysql_query("select * from $table where fid=".$_SESSION["fid"]." order by $pk DESC");
							while($r1=mysql_fetch_object($r)){
                        ?>

							<tr><td class='text-center'><a href='topic_comment_list.php?gdtid=<?= $r1->gdtid?>'><?= $r1->topic;?></a></td>
								<td><?php 
                                        $r2=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$r1->fid));
                                        echo $r2->fname." ".$r2->lname;
                                    ?></td>
								<td><?=  date('d-m-Y H:i A', strtotime($r1->gdtdate)); ?></td>
                                <td><?php 
                                        $r3=mysql_fetch_object(mysql_query("select count(*) c from gd_comment_tbl where gdtid=".$r1->$pk));
                                        echo $r3->c;
                                    ?></td>
								<td class="text-center"><a href='<?= $nm;?>_form.php?eid=<?= $r1->$pk?>' data-toggle='tooltip' title='Edit' class='btn btn-xs btn-default'><i class='icon-pencil'></i></a><a href='?did=<?= $r1->$pk?>' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-default'><i class='icon-remove'></i></a></td></tr>
			
							<?php 	}
							?>
					</tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Topic Added Successfully!','success');});</script>";
}
if(isset($_REQUEST['upd']))
{
    echo "<script>$(document).ready(function(){ pops('Topic Updated Successfully!','success');});</script>";
}
if(isset($_REQUEST['dell']))
{
    echo "<script>$(document).ready(function(){ pops('Topic Deleted Successfully!','success');});</script>";
}
?>