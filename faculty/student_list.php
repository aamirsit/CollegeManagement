<?php 
$table="student_tbl";
$pk="studid";
$nm="student";
if(isset($_REQUEST['cur']))
{
    $name="Current Sem Students";
    if(isset($_REQUEST["eid"]))
    {
        include("DatabaseFiles/cn.php");
        $col = array('isdetend');
        $val = array('1');
        $db->update($table,$pk,$_REQUEST["eid"],$col,$val);
        echo "<script>location.href='student_list.php?cur&success'</script>";
    }
    if(isset($_REQUEST["did"]))
    {
        include("DatabaseFiles/cn.php");
        $col = array('isleave');
        $val = array('1');
        $db->update($table,$pk,$_REQUEST["did"],$col,$val);
        echo "<script>location.href='student_list.php?cur&success'</script>";
    }
}else if(isset($_REQUEST['det']))
{
    $name="Detend Students";
    if(isset($_REQUEST["eid"]))
    {
        include("DatabaseFiles/cn.php");
        $col = array('isdetend');
        $val = array('0');
        $db->update($table,$pk,$_REQUEST["eid"],$col,$val);
        echo "<script>location.href='student_list.php?det&success'</script>";
    }
    if(isset($_REQUEST["did"]))
    {
        include("DatabaseFiles/cn.php");
        $col = array('isleave');
        $val = array('1');
        $db->update($table,$pk,$_REQUEST["did"],$col,$val);
        echo "<script>location.href='student_list.php?det&success'</script>";
    }
}
else if(isset($_REQUEST['lea']))
{
    $name="Leaved Students";
    if(isset($_REQUEST["eid"]))
    {
        include("DatabaseFiles/cn.php");
        $col = array('isdetend','isleave');
        $val = array('0','0');
        $db->update($table,$pk,$_REQUEST["eid"],$col,$val);
        echo "<script>location.href='student_list.php?lea&success'</script>";
    }
    if(isset($_REQUEST["did"]))
    {
        include("DatabaseFiles/cn.php");
        $col = array('isdetend','isleave');
        $val = array('1','0');
        $db->update($table,$pk,$_REQUEST["did"],$col,$val);
        echo "<script>location.href='student_list.php?lea&success'</script>";
    }
}
include("page_content/listheader.php");
?>
</ul>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">Rollno</th>
							<th class="text-center">Name</th>
							<th class="text-center">EnrollId</th>
							<th class="text-center">Semister</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
                             if(isset($_REQUEST['cur']))
                             {
                                $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_SESSION["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'"); 
                             }
                             if(isset($_REQUEST['det']))
                             {
                                $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=1 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_SESSION["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'"); 
                             }
							 if(isset($_REQUEST['lea']))
                             {
                                $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isleave=1 AND student_sem_tbl.sem=".$_SESSION["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'"); 
                             }
							while($r1=mysql_fetch_object($r)){?>

							<tr>
								<td class="text-center"><?=  $r1->rollno;?></td>
								<td class="text-center"><?=  $r1->fname." ".$r1->lname;?></td>
								<td class="text-center"><?=  $r1->enrollid;?></td>
								<td class="text-center"><?= $r1->sem;?></td>
				<?php 
                    
                            if(isset($_REQUEST['cur']))
                             { ?>
                                <td class='text-center'><a href='?cur&eid=<?= $r1->studid?>' data-toggle='tooltip' title='Detend' class='btn btn-xs btn-default'><i class='icon-refresh'></i></a>
								<a href='?cur&did=<?= $r1->studid?>' data-toggle='tooltip' title='leave' class='btn btn-xs btn-default'><i class='icon-remove'></i></a>
								</td>
                             <?php }
                             if(isset($_REQUEST['det']))
                             { ?>
                                <td class='text-center'><a href='?det&eid=<?= $r1->studid?>' data-toggle='tooltip' title='Reallocate' class='btn btn-xs btn-default'><i class='icon-refresh'></i></a>
								<a href='?det&did=<?= $r1->studid?>' data-toggle='tooltip' title='leave' class='btn btn-xs btn-default'><i class='icon-remove'></i></a>
								</td>
                             <?php }
							 if(isset($_REQUEST['lea']))
                             { ?>
                                <td class='text-center'><a href='?lea&eid=<?= $r1->studid?>' data-toggle='tooltip' title='Reallocate' class='btn btn-xs btn-default'><i class='icon-refresh'></i></a>
								<a href='?lea&did=<?= $r1->studid?>' data-toggle='tooltip' title='Detend' class='btn btn-xs btn-default'><i class='icon-remove'></i></a>
								</td>
                             <?php }
                                                              
                ?>
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
    echo "<script>$(document).ready(function(){ pops('Updation Successfull!','success');});</script>";
}
?>
