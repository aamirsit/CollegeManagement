<?php include("DatabaseFiles/cn.php");
$table="faculty_tbl";
$pk="fid";
$nm="faculty";
$n="4";
include("page_content/listheader.php");
?>
			<div class="container">
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								        <div class="modal-dialog">
								            <div class="modal-content">
								                <div class="modal-header">
								                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								                    <h4 class="modal-title" id="myModalLabel"></h4>
								                    </div>
								                <div class="modal-body">
								                   <div class="row">
								                   	<div class="col-sm-4">
								                   		<img class="mimg img-circle" src="" name="aboutme" width="140" height="140" border="0" class="img-circle">
								                   	</div>
								                   	<div class="col-sm-8">
								                   		<h3  id="name" style="font-weight: 400;" class="media-heading"></h3>
								                    	<span id="roll"></span><span> Sem Incharge</span>
								                    	<hr>
								                    	<p class="text-left"><strong>Gender : </strong><bdi id="gender"></bdi></p>
								                    	<p class="text-left"><strong>Date Of birth : </strong><bdi id="dob"></bdi></p>
								                    	<p class="text-left"><strong>Date Of join : </strong><bdi id="doj"></bdi></p>
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

				<?php $r=mysql_query("select * from faculty_tbl where fid!=1");
							while($r1=mysql_fetch_object($r)){?>
                  <div class="col-sm-6">
                    <div class="block text-center animation-fadeIn" style="padding:25px;">
                    	<div class="row">
                    		<div class="col-sm-6">
                    			<div style="border-radius: 50%;width: 150px; height: 150px;overflow: hidden;">
                    				<img src="../faculty/uploadimage/<?=$r1->photo?>" width="150" height="150" alt="">
                    			</div>
                    		</div>
                    		<div class="col-sm-6 text-left">
                    			<h3 style="font-weight: 400;"><?= $r1->fname." ".$r1->lname?></h3>
		                        <?php $s = $r1->$pk;
								$g=mysql_query("select * from faculty_sem_tbl where year='".$_SESSION["year"]."' AND fid='".$s."'");?>
									<p><?php if(mysql_num_rows($g)>0){ $g1=mysql_fetch_object($g); echo $g1->sem." Sem Incharge";}?> </p>
                                <a href='faculty_sem_update.php?eid=<?= $r1->$pk?>' id="<?= $r1->$pk?>" data-toggle='tooltip' title='Allocate Sem' class='btn btn-xs btn-default text-primary'><i class="icon-plus"></i></a>&nbsp;&nbsp;
		                        <a href='<?= $nm;?>_form.php?eid=<?= $r1->$pk?>' data-toggle='tooltip' title='Edit' class='btn btn-xs btn-default text-primary'><i class='icon-pencil'></i></a>&nbsp;&nbsp;
		                        <a href='#' id="<?= $r1->$pk?>" data-toggle='tooltip' title='Delete' class='btn btn-xs btn-default delet text-primary'><i class="icon-remove"></i></a>&nbsp;&nbsp;
		                        <a id="<?= $r1->$pk ?>" data-toggle="modal" title='View More' data-target="#myModal" href='#' class='btn btn-xs btn-default link'><i class="glyphicon-eye_open text-primary"></i></a>	
                    		</div>
                    	</div>
                    </div>
                  </div>
                <?php } ?>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('.delet').click(function() {
					var del = $(this).attr('id');
					$.ajax({
						type: "POST",
						url: 'ajax_page/faculty_dele.php',
						data: {dele: del},
						success: function(data) {
							alert(data);
						}
					});
				});

				$('.link').click(function() {
					var l = $(this).attr('id');
					$.ajax({
						type: "POST",
						url: "ajax_page/fetch_faculty.php",
						data: {fid:l},
						success: function(data) {
							var da = data.split(":");
							$('#myModalLabel').html("More About " + da[1] + " " + da[2]);
							$('.mimg').attr('src', "../faculty/uploadimage/" + da[6]);
							$('#name').html(da[1] + " " + da[2]);
							$('#roll').html(da[7]);
							$('#gender').html(da[3]);
							$('#dob').html(da[4]);
							$('#doj').html(da[5]);
							$('#hidd').val(da[0]);
						} 
					});
				});

			//send student data for editing
			$('#button').click(function() {
				var v = $('#hidd').val();
				var url = "faculty_form.php?eid=" + v;
				$(location).attr('href',url);
			});
		});
	</script>
<?php include("page_content/listfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Faculty Updated Successfully!','success');});</script>";
}
?>
