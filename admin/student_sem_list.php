<?php include("DatabaseFiles/cn.php");
$table="student_sem_tbl";
$pk="smid";
$nm="student_sem";
include("page_content/listheader.php");
?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">Stud_semid</th>
							<th>stud_id</th>
							<th>Year</th>
							<th>Semister</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$r=$db->order($table,$pk);
							while($r1=mysql_fetch_object($r)){?>

							<tr><td class='text-center'><?= $r1->$pk;?></td>
								<td><?=  $r1->studid;?></td>
								<td><?=  $r1->year;?></td>
								<td><?=  $r1->sem;?></td>
								<td class='text-center'><a href='<?= $nm;?>_form.php?eid=<?= $r1->$pk?>' data-toggle='tooltip' title='Edit' class='btn btn-xs btn-default'><i class='icon-pencil'></i></a><a href='?did=<?= $r1->$pk?>' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-default'><i class='icon-remove'></i></a></td></tr>

							<?php 	}
							?>
					</tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>
