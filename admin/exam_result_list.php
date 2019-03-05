<?php include("DatabaseFiles/cn.php");
$table="exam_result_tbl";
$pk="erid";
$nm="exam_result";
include("page_content/listheader.php");
?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">Exam Result Id</th>
							<th>Student Id</th>
							<th>Exam ID</th>
							<th>Subject 1</th>
							<th>Subject 2</th>
							<th>Subject 3</th>
							<th>Subject 4</th>
							<th>Subject 5</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$r=$db->order($table,$pk);
							while($r1=mysql_fetch_object($r)){?>

							<tr><td class='text-center'><?= $r1->$pk;?></td>
								<td><?=  $r1->studid;?></td>
								<td><?=  $r1->exid;?></td>
								<td><?=  $r1->sub1;?></td>
								<td><?=  $r1->sub2;?></td>
								<td><?=  $r1->sub3;?></td>
								<td><?=  $r1->sub4;?></td>
								<td><?=  $r1->sub5;?></td>
								<td><a href='<?= $nm;?>_form.php?eid=<?= $r1->$pk?>' data-toggle='tooltip' title='Edit' class='btn btn-xs btn-default'><i class='icon-pencil'></i></a><a href='?did=<?= $r1->$pk?>' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-default'><i class='icon-remove'></i></a></td></tr>
			
							<?php 	}
							?>
					</tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>