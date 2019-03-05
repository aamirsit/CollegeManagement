<?php include("DatabaseFiles/cn.php");
$table="student_tbl";
$pk="studid";
$nm="student";
$n="5";
if(isset($_REQUEST['cur']))
{
    $name="Current Sem Students";
    if(isset($_REQUEST["eid"]))
    {
        $col = array('isdetend');
        $val = array('1');
        $db->update($table,$pk,$_REQUEST["eid"],$col,$val);
        echo "<script>location.href='student_list.php?success&cur'</script>";
    }
    if(isset($_REQUEST["ddid"]))
    {
        $col = array('isleave');
        $val = array('1');
        $db->update($table,$pk,$_REQUEST["ddid"],$col,$val);
        echo "<script>location.href='student_list.php?success&cur'</script>";
    }
}else if(isset($_REQUEST['det']))
{
    $name="Detend Students";
    if(isset($_REQUEST["eid"]))
    {
        $col = array('isdetend');
        $val = array('0');
        $db->update($table,$pk,$_REQUEST["eid"],$col,$val);
        echo "<script>location.href='student_form.php?det&eid=".$_REQUEST["eid"]."'</script>";
    }
    if(isset($_REQUEST["ddid"]))
    {
        $col = array('isleave');
        $val = array('1');
        $db->update($table,$pk,$_REQUEST["ddid"],$col,$val);
        echo "<script>location.href='student_list.php?success&det'</script>";
    }
}
else if(isset($_REQUEST['lea']))
{
    $name="Leaved Students";
    if(isset($_REQUEST["eid"]))
    {
        $col = array('isdetend','isleave');
        $val = array('0','0');
        $db->update($table,$pk,$_REQUEST["eid"],$col,$val);
        echo "<script>location.href='student_form.php?lea&eid=".$_REQUEST["eid"]."'</script>";
    }
    if(isset($_REQUEST["ddid"]))
    {
        $col = array('isdetend','isleave');
        $val = array('1','0');
        $db->update($table,$pk,$_REQUEST["ddid"],$col,$val);
        echo "<script>location.href='student_list.php?success&lea'</script>";
    }
}
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
                             if(isset($_REQUEST['cur']))
                             {
                                $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.year='".$_SESSION["year"]."'"); 
                             }
                             if(isset($_REQUEST['det']))
                             {
                                $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=1 AND student_tbl.isleave=0 AND student_sem_tbl.year='".$_SESSION["year"]."'"); 
                             }
							 if(isset($_REQUEST['lea']))
                             {
                                $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isleave=1 AND  student_sem_tbl.year='".$_SESSION["year"]."'"); 
                             }
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
                                        $s=mysql_fetch_object(mysql_query("select * from student_sem_tbl where studid=".$r1->studid));
                                        echo "SEM-".$s->sem;
                                    ?></td>
								<td><?=  $r1->approve;?></td>
								<td class='text-center'>
								<?php 
                    
                            if(isset($_REQUEST['cur']))
                             { ?>
                                <a href='<?= $nm;?>_form.php?eid=<?= $r1->$pk?>' data-toggle='tooltip' title='Edit' class='btn btn-xs btn-default'><i class='icon-pencil'></i></a><a href='?did=<?= $r1->$pk?>' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-default'><i class='icon-remove'></i></a>
                                <a href='?cur&eid=<?= $r1->studid?>' data-toggle='tooltip' title='Detend' class='btn btn-xs btn-default'><i class='icon-refresh'></i></a>
								<a href='?cur&ddid=<?= $r1->studid?>' data-toggle='tooltip' title='leave' class='btn btn-xs btn-default'><i class='icon-eye-close'></i></a>
								
                             <?php }
                             if(isset($_REQUEST['det']))
                             { ?>
                                <a href='?det&eid=<?= $r1->studid?>' data-toggle='tooltip' title='Reallocate' class='btn btn-xs btn-default'><i class='icon-refresh'></i></a>
								<a href='?det&ddid=<?= $r1->studid?>' data-toggle='tooltip' title='leave' class='btn btn-xs btn-default'><i class='icon-remove'></i></a>
								
                             <?php }
							 if(isset($_REQUEST['lea']))
                             { ?>
                                <a href='?lea&eid=<?= $r1->studid?>' data-toggle='tooltip' title='Reallocate' class='btn btn-xs btn-default'><i class='icon-refresh'></i></a>
								<a href='?lea&ddid=<?= $r1->studid?>' data-toggle='tooltip' title='Detend' class='btn btn-xs btn-default'><i class='icon-remove'></i></a>
								
                             <?php }
                                                              
                                ?></td>
								</tr>

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
