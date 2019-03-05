<?php include("DatabaseFiles/cn.php");
$table="event_tbl";
$pk="eid";
$nm="event";
$n="6";
include("page_content/listheader.php");
?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">Event Id</th>
							<th>Event Name</th>
							<th>Event Date</th>
							<th>Event Time</th>
							<th>Description</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$r=$db->order($table,$pk);
							while($r1=mysql_fetch_object($r)){?>

							<tr><td class='text-center'><?= $r1->$pk;?></td>
								<td><?=  $r1->name;?></td>
								<td><?=  $r1->edate;?></td>
								<td><?=  $r1->etime;?></td>
								<td><?=  $r1->description;?></td>
								<td class='text-center'><a href='<?= $nm;?>_form.php?eid=<?= $r1->$pk?>' data-toggle='tooltip' title='Edit' class='btn btn-xs btn-default'><i class='icon-pencil'></i></a><a href='?did=<?= $r1->$pk?>' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-default'><i class='icon-remove'></i></a></td></tr>

							<?php 	}
							?>
					</tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>
