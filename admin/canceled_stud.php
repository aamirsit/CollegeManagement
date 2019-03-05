<?php include("DatabaseFiles/cn.php");
$table="student_tbl";
$pk="studid";
$nm="Canceled student";
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
							$r=mysql_query("select * from student_tbl where approve='N' ");
							while($r1=mysql_fetch_object($r)){?>

							<tr>
								<td><img src="../faculty/uploadimage/<?=  $r1->photo;?>" style="border-radius:50%;" width="50" height="50" alt="no image"></td>
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
								<td class='text-center'><a href="#" id="<?= $r1->$pk?>" data-toggle='tooltip' title='Approve' class='btn btn-xs btn-default approve'><i class='icon-check'></i></a><a href="student_form.php?eeid=<?= $r1->$pk?>" data-toggle='tooltip' title='Edit' class='btn btn-xs btn-default'><i class='icon-edit'></i></a></td></tr>

							<?php 	}
							?>
					</tbody>
				</table>
			</div>
		</div>
		<script>
			$(document).ready(function() {
                $('.approve').click(function() {
					var del = $(this).attr('id');
					$.ajax({
						type: "POST",
						url: 'ajax_page/studdata_app.php',
						data: {dele: del},
						success: function(data) {
                            location.href='canceled_stud.php?up';
						}
					});
				});
            });
        </script>
<?php include("page_content/listfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Updation Successful!','success');});</script>";
}
if(isset($_REQUEST['up']))
{
    echo "<script>$(document).ready(function(){ pops('Student Approved Successfully!','success');});</script>";
}
?>
