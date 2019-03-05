<?php include("DatabaseFiles/cn.php");
$table="subject_tbl";
$pk="subid";
$nm="subject";
$n="12";
if(isset($_REQUEST["uid"]))
{
    mysql_query("update subject_tbl set fid=NULL where subid=".$_REQUEST["uid"]);
    echo "<script>location.href='subject_list.php'?success;</script>";
}
include("page_content/listheader.php");
?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Subject Code</th>
							<th>Subject Name</th>
							<th>Semester</th>
							<th>Faculty Id</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>    
						<?php 
							$r=mysql_query("select * from subject_tbl where sname!='Practical'");
							while($r1=mysql_fetch_object($r)){?>

							<tr>
								<td><?=  $r1->scode;?></td>
								<td><?=  $r1->sname;?></td>
								<td><?=  "SEM-".$r1->sem;?></td>
								<td><?php 
                                        $ff=mysql_query("select * from faculty_tbl where fid=".$r1->fid);
                                        if($ff)
                                        { $f=mysql_fetch_object($ff);
                                            echo "<b style='color:green'>".$f->fname." ".$f->lname."</b>";}else{echo "<b style='color:red'>Not Allocated<b>";}
                                    ?></td>
								<td class="text-center"><a href='?success&uid=<?= $r1->$pk?>' data-toggle='tooltip' title='Unallocate' class='btn btn-xs btn-default'><i class='icon-minus'></i></a><a href='<?= $nm;?>_form.php?aid=<?= $r1->$pk?>' data-toggle='tooltip' title='Allocate' class='btn btn-xs btn-default'><i class='icon-plus'></i></a><a href='<?= $nm;?>_form.php?eid=<?= $r1->$pk?>' data-toggle='tooltip' title='Edit Subject' class='btn btn-xs btn-default'><i class='icon-pencil'></i></a><a href='?did=<?= $r1->$pk?>' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-default'><i class='icon-remove'></i></a></td></tr>
			
							<?php 	}
							?>
					</tbody>
				</table>
			</div>
		</div>
<?php include("page_content/listfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Updation Successful!','success');});</script>";
}
?>