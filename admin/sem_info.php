
<?php include("DatabaseFiles/cn.php");
$table="student_sem_tbl";
$sem= $_REQUEST["sem"];
$nm="Semester";
$n="2";
include("page_content/sem_info_header.php");
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 headi">
			<span class="h2" style="color:#B99663">Semester Incharge information</span>
		</div>
		<div class="col-md-6 headi">
			<span class="h2 " style="color:#B99663"><?php echo $_SESSION["year"]; ?> Exam Information</span>
		</div>
	</div>
	<div class="row">
			<?php 
			$r=mysql_query("select * from faculty_tbl t1 INNER JOIN faculty_sem_tbl t2 where t1.fid=t2.fid AND t2.year='".$_SESSION["year"]."' AND t2.sem=".$sem);
			while($r1=mysql_fetch_object($r)){ ?>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<div class="box">
							<img src="../faculty/uploadimage/<?=  $r1->photo;?>" width="150" height="150">
						</div>
						<h4 class="text-center"><b><?= $r1->fname." ".$r1->lname?></b></h4>
					</div>
					<div class="col-md-6">
						<div>
							<ul>
								<li class="info" style="padding-top:50px;">Date of Birth : <?= $r1->dob ?></li>
								<li class="info">Gender : <?= $r1->gender ?></li>
								<li class="info">Date of Join : <?= $r1->doj ?></li>
								<li class="info">Incharge of : <?= $r1->sem ?> Semester</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
			<?php 
			$r=mysql_query("select * from exam_tbl where exname!='Practical'");
			while($r1=mysql_fetch_object($r)){ ?>
			<div class="col-md-6">
					<div class="col-md-6" style="padding:5px;">
								<div class="btn-group">
								<a style="width:300px;text-align: start!important;" href="" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><i class="glyphicon-pen"></i><?="&nbsp;&nbsp;&nbsp;".$r1->exname ?>&nbsp;&nbsp;&nbsp;<span class="icon-caret-down icon-fixed-width pull-right"></span></a>
								<ul style="width:300px;" class="dropdown-menu">
									<li><a href="exam_report_list.php?exid=<?= $r1->exid ?>&sem=<?= $sem ?>&sbtn=">View all subject marks</a></li>
									<?php 
					      			$s=mysql_query("select * from subject_tbl where sname!='Practical' AND sem=".$sem);
									while($s1=mysql_fetch_object($s)){ ?>
									<li><a href="exam_subject_list.php?sem=<?= $sem ?>&exid=<?= $r1->exid ?>&subid=<?= $s1->subid ?>"><span style="font-size:10px;color:red;">Edit</span> <?= $s1->sname ?></a></li>
									<?php }?>
								</ul>
								
						</div>
					</div>
				</div>
			<?php }?><div class="col-md-6">
					<div class="col-md-6" style="padding:5px;">
								<div class="btn-group">
								<a style="width:300px;text-align: start!important;" href="" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><i class="glyphicon-pen"></i><?="&nbsp;&nbsp;&nbsp;Practical" ?>&nbsp;&nbsp;&nbsp;<span class="icon-caret-down icon-fixed-width pull-right"></span></a>
								<ul style="width:300px;" class="dropdown-menu">
			<?php 
                                $r1=mysql_fetch_object(mysql_query("select * from exam_tbl where exname='Practical'"));
                                $s1=mysql_fetch_object(mysql_query("select * from subject_tbl where sname='Practical' AND sem=".$sem));?>
								<li><a href="exam_subject_list.php?sem=<?= $sem ?>&exid=<?= $r1->exid ?>&subid=<?= $s1->subid ?>"><span style="font-size:10px;color:red;">Edite</span> <?= $s1->sname ?></a></li></ul>
								
						</div>
					</div>
				</div>
		</div>

						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								        <div class="modal-dialog">
								            <div class="modal-content">
								                <div class="modal-header">
								                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								                    <h4 class="modal-title" id="myModalLabel"></h4>
								                    </div>
								                <div class="modal-body">
								                   <div class="row">
								                   	<div class="col-md-4">
								                   		<img class="mimg img-circle" src="" name="aboutme" width="140" height="140" border="0" class="img-circle">
								                   	</div>
								                   	<div class="col-md-8">
								                   		<h3  id="name" style="font-weight: 400;" class="media-heading"></h3>
								                    	<span>Roll no : </span><span id="roll"></span>
								                    	<hr>
								                    	<p class="text-left"><strong>Gender : </strong><bdi id="gender"></bdi></p>
								                    	<p class="text-left"><strong>Date Of birth : </strong><bdi id="dob"></bdi></p>
								                    	<p class="text-left"><strong>Admission Year : </strong><bdi id="ay"></bdi></p>
								                    	<p class="text-left"><strong>Enrollment Id : </strong><bdi id="eid"></bdi></p>
								                    	<input type="hidden" id="hidd" value="">
								                   	</div>
								                   </div>						                    
								                </div>
								                <div class="modal-footer">
								                    <center>
								                    <button id="button" type="button" class="btn btn-default" data-dismiss="modal">Edit</button>
								                    </center>
								                </div>
								            </div>
								        </div>
								    </div>


<?php 
$table="attendence_tbl";
$pk="attid";
$nm="Percentage Wise Attendence"; 
?>        <h1 style="color:#B99663">Attendance Sem-<?= $_REQUEST["sem"]?></h1>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead class="text-center">
						<tr>
							<th class="text-center">RollNO</th>
							<th class="text-center">Name</th>
							<th class="text-center">Attendence</th>
							<th class="text-center">Percentage</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
							 $r=mysql_query("select student_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.year='".$_SESSION["year"]."' AND student_sem_tbl.sem=".$_REQUEST["sem"]);
							while($r1=mysql_fetch_object($r)){
                                //echo $r1->studid."-----";
                                $y=explode("-",$_SESSION["year"]);
                                $y1=mysql_query("select * from attendence_tbl where sem=".$_REQUEST["sem"]);
                                $k=0;
                                while($yy1=mysql_fetch_object($y1))
                                {
                                    $at=explode("-",$yy1->attenddate);
                                    if($at[0]==$y[0] || $at[0]==$y[1])
                                    {
                                        $attid[$k]=$yy1->attid;
                                        $k++;
                                    }
                                }
                                //echo "<script>alert($year);</script>";
                                $count=$k;
                                $c1=$count;
                                
                        ?>

							    <tr><td class='text-center'><a class="link" href="" id="<?= $r1->rollno?>" data-toggle="modal" data-target="#myModal"><?= $r1->rollno?></a></td>
								<td><?=  $r1->fname." ".$r1->lname?></td>
								<?php if(isset($attid)){?>
								<td><a href="attendence_stud_list.php?studid=<?= $r1->studid?>&sem=<?= $_REQUEST["sem"]?>">
								    <?php 
                                         $p=$c1;
                                    
                                        for($j=0;$j<count($attid);$j++)
                                        {
                                            $q=mysql_query("select * from attendence_tbl where attid=$attid[$j]");
                                            while($q1=mysql_fetch_object($q))
                                            {
                                                $stud=explode(",",$q1->studid);
                                                $s1="";

                                                for($i=0;$i<count($stud)-1;$i++)
                                                {
                                                    if($r1->studid == $stud[$i])
                                                    {
                                                        $c1--;
                                                    }
                                                }
                                            }
                                        }
                                echo $c1."/".$p; $per=(100*$c1)/$p;?></a>
								</td>
								<td><?php echo number_format((float)$per,2,'.',''),"%"; ?></td></tr>
							<?php 	}else echo "<td>No Entry</td><td>No Entry</td><tr>"; }
							?>
					</tbody>
				</table>
			</div>
		</div>
</div>
<script>
	$(document).ready(function() {

		//more information student popup
		$('.link').click(function() {

			var l = $(this).attr('id');
			
			$.ajax({
				type: "POST",
				url: "ajax_page/fetch.php",
				data: {roll:l},
				success: function(data) {
					var da = data.split(":");
					$('#myModalLabel').html("More About " + da[1] + " " + da[2]);
					$('.mimg').attr('src', "../faculty/uploadimage/" + da[7]);
					$('#name').html(da[1] + " " + da[2]);
					$('#roll').html(da[0]);
					$('#gender').html(da[3]);
					$('#dob').html(da[4]);
					$('#ay').html(da[5]);
					$('#eid').html(da[6]);
					$('#hidd').val(da[8]);
				} 
			});
		});

		//send student data for editing
		$('#button').click(function() {
			var v = $('#hidd').val();
			var url = "student_form.php?eid=" + v;
			$(location).attr('href',url);
		});
	});
</script>
<?php include("page_content/listfooter.php");?>