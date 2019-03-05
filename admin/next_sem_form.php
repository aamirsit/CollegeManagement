<?php 
$table="student_sem_tbl";
$pk="smid";
$nm="next_sem";
if(isset($_REQUEST["sbtn"])) {
    
include("DatabaseFiles/cn.php");
        if(!empty($_REQUEST['checklist']))
        {
            $sem=$_SESSION["sem"]+1;
        foreach($_REQUEST['checklist'] as $sel)
        {
            $col=array('sem');
			$val=array($sem);
			$db->update($table,'studid',$sel, $col, $val);
        }
            $col=array('semincharge');
            $val=array($sem);
            $db->update('faculty_tbl','fid',$_SESSION["fid"],$col,$val);
            echo "<script>location.href='logout.php'</script>";
		}
}
include("page_content/frmheader.php");	
?>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
                    <h2>Check Student To Send Them To Next Sem</h2>
					<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead class="text-center">
						<tr>
							<th class="text-center">Roll NO</th>
							<th class="text-center">Name</th>
							<th class="text-center">Next Sem</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
                            $r=mysql_query("select s.* from student_tbl s inner join student_sem_tbl ss where s.studid=ss.studid AND student_sem_tbl.year='".$_SESSION["year"]."' ss.sem=".$_SESSION["sem"]);
                            while($r1=mysql_fetch_object($r))
                            {?>
                            <tr>
                                <td><?= $r1->rollno;?></td>
                                <td><?= $r1->fname." ".$r1->lname;?></td>
                                <td><input type="Checkbox" value="<?=$r1->studid?>" name="checklist[]" checked /></td>
                            </tr>
                            <?php }
                        ?>
					</tbody>
				</table>
			</div>
		</div>
					<div class="form-group" style="margin:-20px 0 40px 20px;">
						<input type="submit" name="sbtn" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
<?php include("page_content/frmfooter.php");?>