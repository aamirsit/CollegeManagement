<?php include("DatabaseFiles/cn.php");
$table="news_tbl";
$pk="nid";
$nm="news";
$n="6";
if(isset($_REQUEST['eeid']))
{
    $col=array('enabled');
    $val=array('Y');
    $db->update($table,$pk,$_REQUEST["eeid"], $col, $val);
    echo "<script>location.href='".$nm."_list.php?enabled'</script>";
}
if(isset($_REQUEST['deid']))
{
    $col=array('enabled');
    $val=array('N');
    $db->update($table,$pk,$_REQUEST["deid"], $col, $val);
    echo "<script>location.href='".$nm."_list.php?disabled'</script>";
}
include("page_content/listheader.php");
?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>News Name</th>
							<th>News Date</th>
							<th>News Time</th>
							<th>Description</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$r=$db->order($table,$pk);
							while($r1=mysql_fetch_object($r)){?>

							<tr>
								<td><?=  $r1->name;?></td>
								<td><?=  $r1->ndate;?></td>
								<td><?=  date('h:i A',strtotime($r1->ntime));?></td>
                                <td><?=  $r1->description;?></td>
								<td class='text-center'>
								<?php if($r1->enabled=='N'){?>
								<a href='<?= $nm;?>_list.php?eeid=<?= $r1->$pk?>' data-toggle='tooltip' title='Enable' class='btn btn-xs btn-default'><i class='glyphicon-eye_close'></i></a>
								<?php }else{?>
								<a href='<?= $nm;?>_list.php?deid=<?= $r1->$pk?>' data-toggle='tooltip' title='Disable' class='btn btn-xs btn-default'><i class='glyphicon-eye_open'></i></a>
								<?php }?>
								<a href='<?= $nm;?>_form.php?eid=<?= $r1->$pk?>' data-toggle='tooltip' title='Edit' class='btn btn-xs btn-default'><i class='icon-pencil'></i></a><a href='?did=<?= $r1->$pk?>' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-default'><i class='icon-remove'></i></a></td></tr>

							<?php 	}
							?>
					</tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){pops('News Updated Successfully!','success');});</script>";
}
if(isset($_REQUEST['enabled']))
{
    echo "<script>$(document).ready(function(){pops('News Enabled Successfully!','success');});</script>";
}
if(isset($_REQUEST['disabled']))
{
    echo "<script>$(document).ready(function(){pops('News Disabled Successfully!','success');});</script>";
}
?>
