
<?php include("DatabaseFiles/cn.php");
$table="student_sem_tbl";
$pk="smid";
$nm="Next_sem";
$n="3";
$year=$_SESSION["year"];
if(isset($_REQUEST["sbtn"])) {
$sem = $_REQUEST['semi'];
        if(!empty($_REQUEST['checklist']))
        {if($sem!=6)
            {
                $r1=mysql_fetch_object(mysql_query("select ss.* from student_tbl s inner join student_sem_tbl ss where s.studid=ss.studid AND s.isdetend=0 AND s.isleave=0 AND ss.sem=".$sem." AND ss.year='".$_SESSION["year"]."' order by ss.year"));
                if($sem%2==0)
                {
                    $at=explode("-",$r1->year);
                    $be=$at[0];
                    $af=$at[1];
                    $be=$be+1;
                    $af=$af+1;
                    (string)$year=$be."-".$af;
                    
                    $yy=mysql_fetch_object(mysql_query("select * from year_tbl order by yid DESC LIMIT 1"));
                    if($yy->year!=$year)
                    {
                        $col=array('yid','year');
                        $val=array(null,$year);
                        $db->insert('year_tbl',$col,$val);
                    }
                }
                else{
                    (string)$year=$r1->year;
                }
                $sem=$sem+1;
                $inc=0;
                foreach($_REQUEST['checklist'] as $sel)
                {
                    $col=array($pk,'studid','year','sem');
                    $val=array(null,$sel,$year,$sem);   
                    $db->insert($table,$col, $val);
                    $stud[]=$sel;
                    $inc++;
                }
                $sem=$sem-1;
                $st=mysql_query("select s.* from student_sem_tbl ss inner join student_tbl s where s.studid=ss.studid AND s.isdetend=0 AND s.isleave=0 AND ss.year='".$_SESSION["year"]."' AND ss.sem=".$sem);
                $flag=1; 
                while($stt=mysql_fetch_object($st))
                {
                    for($x=0;$x<count($stud);$x++)
                    {   
                            if($stt->studid==$stud[$x])
                            {
                                $flag = 0 ;
                                break;;
                            }
                            else{
                                $flag = 1 ;
                            }
                    }
                    if($flag==1)
                    {
                        $col=array('isdetend');
                        $val=array(1);
                        //echo "..................$stt->rollno";
                        $db->update('student_tbl','studid',$stt->studid, $col, $val);
                    }
                }
                    //$col=array('fsid','year','sem','fid');
                    //$val=array(null,$year,$sem,$_SESSION["lid"]);
                    //$db->insert('faculty_sem_tbl',$col,$val);
                    
                echo "<script>location.href='next_sem_form1.php?success'</script>";
                
            }
        }
}
include("page_content/frmheader.php");	
if(isset($_REQUEST['success']))
                {
                 echo "<script>$(document).ready(function(){pops('Semester Upgraded!','success');});</script>";
            }
?>

	<div class="row gutter30">
		<form method="post" id="form1" action="">
			<div class="col-sm-3 col-sm-offset-2">
				<div class="block" style="border: none;box-shadow: none;margin:20px 0">
					<div class="input-group">
						<span class="input-group-addon">Semester</span>
						<select name="semi" class="form-control">
							<?php $d=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' group by year,sem");
                            $flag=0;
                			while($d1=mysql_fetch_object($d)){
                            if($d1->sem!=null && $d1->sem%2==0){
                                $flag++;
                            }}
                            if($flag!=0)
                            {   $d=mysql_query("select * from student_sem_tbl where year='".$year."' AND sem%2=0 AND sem!=6 group by year,sem");
                                 while($d1=mysql_fetch_object($d)){
                            ?>
								<option value="<?= $d1->sem?>" <?php if(isset($_REQUEST["semi"]) && $_REQUEST["semi"]==$d1->sem){echo "Selected";}?>>SEM-<?= $d1->sem ?></option>
				            <?php }}else{
                            $d=mysql_query("select * from student_sem_tbl where year='".$year."'group by year,sem");
                         while($d1=mysql_fetch_object($d)){
                            ?>
                                <option value="<?= $d1->sem?>" <?php if(isset($_REQUEST["semi"]) && $_REQUEST["semi"]==$d1->sem){echo "Selected";}?>>SEM-<?= $d1->sem ?></option>
							<?php }}?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="block" style="border: none;box-shadow: none;margin:20px 0">
					<div class="input-group">
					    
						<input type="submit" action="" name="sbt" class="btn btn-primary" value="show Student">
					</div>
				</div>
			</div>
		</form>
	</div>
                
	<?php if(isset($_REQUEST["sbt"])) {
	?>
   
    <div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
                    <h2>Upgrade Student Semister</h2>
					<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead class="text-center">
						<tr>
							<th class="text-center">Roll NO</th>
							<th class="text-center">Name</th>
							<th class="text-center">Check/Uncheck</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
                            $r=mysql_query("select s.* from student_tbl s inner join student_sem_tbl ss where s.studid=ss.studid AND s.isdetend=0 AND s.isleave=0 AND ss.year='".$_SESSION["year"]."' AND ss.sem=".$_REQUEST["semi"]);
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
			<div class="form-group">
                        <input type="hidden" value="<?= $_REQUEST['semi']?>" name="semi">
						<input type="submit" name="sbtn" class="btn btn-primary">
					</div>
					</form>
		</div>
					
				
			</div>
		</div><?php }?>
</div>

<script>$(function(){webApp.datatables(),$("#example-datatable").dataTable({aoColumnDefs:[{bSortable:!1,aTargets:[2]}],iDisplayLength:-1,aLengthMenu:[[-1,15,30,50],["All",15,30,50]]}),$(".dataTables_filter input").addClass("form-control").attr("placeholder","Search")});</script>
<?php include("page_content/frmfooter.php");?>