<?php include("DatabaseFiles/cn.php");
$table="student_tbl";
$pk="studid";
$nm="student";
$n="5";
include("page_content/listheader.php");
?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Photo</th>
							<th>Rollno</th>
							<th>Name</th>
							<th>Gender</th>
							<th>DOB</th>
							<th>AddYear</th>
							<th>EnrollId</th>
							<th>SEM</th>
							<th>Approval</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$r=mysql_query("select * from student_tbl where approve IS NULL AND username IS NOT NULL AND password IS NOT NULL");
							while($r1=mysql_fetch_object($r)){?>

							<tr>
								<td><img src="../faculty/uploadimage/<?= $r1->photo;?>" style="border-radius:50%;" width="50" height="50" alt="no image"></td>
								<td><?=  $r1->rollno;?></td>
								<td><?=  $r1->fname." ".$r1->lname;?></td>
								<td><?=  $r1->gender;?></td>
								<td><?=  $r1->dob;?></td>
								<td><?=  $r1->admissionyear;?></td>
								<td><?=  $r1->enrollid;?></td>
								<td><?php 
                                        $s=mysql_fetch_object(mysql_query("select * from student_sem_tbl where studid=".$r1->studid." order by sem DESC LIMIT 1"));
                                        echo "SEM-".$s->sem;
                                    ?></td>
								<td><?=  $r1->approve;?></td>
								<td class='text-center'><a href="#" id="<?= $r1->$pk?>" data-toggle='tooltip' title='Approve' class='btn btn-xs btn-default approve'><i class='icon-check'></i></a><a href="#" id="<?= $r1->$pk?>" data-toggle='tooltip' title='Cancel' class='btn btn-xs btn-default delete'><i class='icon-remove '></i></a></td></tr>

							<?php 	}
							?>
					</tbody>
				</table>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('.delete').click(function() {
					var del = $(this).attr('id');
					$.ajax({
						type: "POST",
						url: 'ajax_page/studdata_del.php',
						data: {dele: del},
						success: function(data) {
                            location.href='new_regstud.php?cn';
						}
					});
				});
                $('.approve').click(function() {
					var del = $(this).attr('id');
					$.ajax({
						type: "POST",
						url: 'ajax_page/studdata_app.php',
						data: {dele: del},
						success: function(data) {
                            location.href='new_regstud.php?ap';
						}
					});
				});
            });
        </script>
<?php include("page_content/listfooter.php");
if(isset($_REQUEST['ap']))
{
    echo "<script>$(document).ready(function(){ pops('Student Approved Successfully!','success');});</script>";
}
if(isset($_REQUEST['cn']))
{
    echo "<script>$(document).ready(function(){ pops('Student Canceled Successfully!','success');});</script>";
}
?>
