<?php 
$table="exam_result_tbl";
$pk="erid";
$nm="exam_subject";
$name="Practical Marks";
if(isset($_REQUEST["sbtn"])) 
    { include("DatabaseFiles/cn.php");
            
            if(!isset($_REQUEST["update"]))
            {
              for($i=0;$i<count($_REQUEST["marks"]);$i++)
                {
                        $col=array($pk,'smid','exid','subid','marks');
                        $val=array(null,$_REQUEST['smid'][$i],$_REQUEST['h2'],$_REQUEST["subid"],$_REQUEST['marks'][$i]);
                        $db->insert($table, $col, $val);
                       // echo $_REQUEST["smid"][$i]."--".$_REQUEST["h2"]."--".$_REQUEST["subid"]."--".$_REQUEST["marks"][$i];
                        echo "<script>location.href='practical.php?success'</script>";
                }
            }
            else
            {
                
                 for($i=0;$i<count($_REQUEST["marks"]);$i++)
                    {
                        $col=array('marks');
                        $val=array($_REQUEST['marks'][$i]);
                        $smid=$_REQUEST['smid'][$i];
                        $p=mysql_query("select * from exam_result_tbl where smid=$smid AND exid=".$_REQUEST["h2"]." AND subid=".$_REQUEST["subid"]);
                        $pkk=mysql_fetch_object($p);
                       // echo "--------".$_REQUEST["smid"][$i]."--".$_REQUEST["h2"]."--".$_REQUEST["subid"]."--".$_REQUEST["marks"][$i]."--".$pk->erid;
                       $db->update($table,$pk,$pkk->erid, $col, $val);
                    }
                   echo "<script>location.href='practical.php?upd'</script>";
            }
     $flag=1;
	}else{
    $flag=0;
}
include("page_content/frmheader.php");	
?>
<style type="text/css">
    .sbtn{
        visibility: hidden;
    }
</style>
<link href="css/bvalidator.theme.gray2.css" rel="stylesheet">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.bvalidator-yc.js"></script>
<script src="js/jquery.bvalidator.js"></script>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
                <form method="post" id="form1">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><b>Select SEM</b></span>
							<select name="sem" class="form-control" style="width:200px;" >
                                <option disabled selected>Choose</option>
							    <?php 
                                    $d=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' group by year,sem");
                            $flg=0;
                			while($d1=mysql_fetch_object($d)){
                            if($d1->sem!=null && $d1->sem%2==0){
                                $flg++;
                            }}
                            if($flg!=0)
                            {   $d=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' AND sem%2=0 AND sem!=6 group by year,sem");
                                 while($d1=mysql_fetch_object($d)){
                            ?><option value="<?= $d1->sem?>" <?php if(isset($_REQUEST["sem"]) && $_REQUEST["sem"]==$d1->sem){echo "Selected";}?>>SEM-<?= $d1->sem ?></option>
				            <?php }}else{
                            $d=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."'group by year,sem");
                         while($d1=mysql_fetch_object($d)){
                            ?>
                                <option value="<?= $d1->sem?>" <?php if(isset($_REQUEST["sem"]) && $_REQUEST["sem"]==$d1->sem){echo "Selected";}?>>SEM-<?= $d1->sem ?></option>
							<?php }}?>
							</select>
                        </div>
                    </div>
                      <div class="form-group ssbtn" style="margin:-50px 0 20px 350px;">
				         <span class="input-group-btn">
                            <button type="submit" data-toggle='tooltip' title='Search'  name="ssbtn" class="btn btn-primary"><i class="icon-search"></i> Search</button>
                         </span>
                     </div><?php if(isset($_REQUEST["ssbtn"]))
                                {?>
                                <style type="text/css">
                                    .sbtn{
                                        visibility: visible;
                                    }
                                </style>
                       <div class="table-responsive">
                        <table id="example-datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">RollNO</th>
                                    <th>Name</th>
                                    <th>Marks</th>
                                </tr>
                            </thead>
                            <tbody>    
                            <?php
                                   // $x=mysql_fetch_object(mysql_query("select * from subject_tbl where subid=".$_REQUEST["subid"]));
                                    $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_sem_tbl inner join student_tbl where student_sem_tbl.studid = student_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_REQUEST["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'");   
                                    while($r1=mysql_fetch_object($r))
                                    { $con=mysql_fetch_object(mysql_query("select * from exam_tbl where exname='Practical'"));
                                    ?>

                                    <tr>
                                        <td class='text-center'><?= $r1->rollno;?></td>
                                        <td><?=  $r1->fname." ",$r1->lname;?></td>
                                        <?php
                                        $subb=mysql_fetch_object(mysql_query("select * from subject_tbl where sem=".$_REQUEST["sem"]." AND sname='Practical'"));?>
                                        <input type="hidden" value="<?= $subb->subid?>" name="subid">
                                        <?php $mr1=mysql_fetch_object(mysql_query("select * from exam_result_tbl where smid=$r1->smid AND exid=".$con->exid." AND subid=".$subb->subid));
                                        if(!$mr1)
                                        {?>
                                          <td><input data-bvalidator="min[0],max[<?= $con->marks?>],required" type="text" name="marks[]" value=""></td><?php }else{
                                        ?>
                                        <input type="hidden" value="update" name="update">
                                        <td><input data-bvalidator="min[0],max[<?= $con->marks?>],required" type="text" name="marks[]" value="<?= $mr1->marks?>"></td><?php }?>
                                        <input type="hidden" name="smid[]" value='<?= $r1->smid?>'>
                                    </tr>
                                    <?php }}?>
                            </tbody>
				        </table>
                    </div>  
					<input type="hidden" value="<?= $con->exid?>" name="h2" placeholder="Last Name">
					<div class="form-group">
						<input type="submit"  name="sbtn" class="btn btn-primary sbtn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
    <script>$(function(){webApp.datatables(),$("#example-datatable").dataTable({aoColumnDefs:[{bSortable:!1,aTargets:[2]}],iDisplayLength:-1,aLengthMenu:[[2,30,50,-1],[2,30,50,"All"]]}),$(".dataTables_filter input").addClass("form-control").attr("placeholder","Search")});</script>
<?php 
    include("page_content/frmfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Marks Inserted Successful!','success');});</script>";
}
if(isset($_REQUEST['upd']))
{
    echo "<script>$(document).ready(function(){ pops('Marks Updated Successful!','success');});</script>";
}
?>