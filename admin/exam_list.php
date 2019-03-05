<?php include("DatabaseFiles/cn.php");
$table="exam_tbl";
$pk="exid";
$nm="exam";
$n=0;
include("page_content/listheader.php");
?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
						    <th class="text-center">#</th>
							<th>Exam Name</th>
							<th class="text-center">Total Marks</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$r=$db->order($table,$pk);
                            $i=1;
							while($r1=mysql_fetch_object($r)){?>

							<tr>
							    <td class="text-center"><?= $i?></td>
								<td><?=  $r1->exname;?></td>
								<td class="text-center"><?= $r1->marks;?></td>
								<td class="text-center"><a href='<?= $nm;?>_form.php?eid=<?= $r1->$pk?>' data-toggle='tooltip' title='Edit' class='btn btn-xs btn-default'><i class='icon-pencil'></i></a><a href='?did=<?= $r1->$pk?>' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-default'><i class='icon-remove'></i></a></td></tr>
			
							<?php $i++;	}
							?>
					</tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Exam Updated Successfully!','success');});</script>";
}
if(isset($_REQUEST['deli']))
{
    echo "<script>$(document).ready(function(){ pops('Exam Deleted Successfully!','success');});</script>";
}
?>