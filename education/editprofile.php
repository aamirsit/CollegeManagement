
<?php include("DatabaseFiles/cn.php");
 if(!isset($_SESSION["studid"]))
    {
        echo "<script type='text/javascript'>
        function preventBack() {
            window.history.forward();
        }
        setTimeout('preventBack()',0);location.href='index.php'</script>";

        
    }
include("pages/head.php");?>
<?php include("pages/header.php");?>
<!--// Mini Header \\-->
<div class="container-fluid" style="padding:0px;">
		<div class="wm-mini-header">
			<span class="wm-blue-transparent"></span>
			 <div class="container">
			    <div class="row">
				    <div class="col-md-12">
				        <div class="wm-mini-title">
				       		<h1>Edit Your Profile</h1> 
				        </div>
				        <div class="wm-breadcrumb">
				          	<ul>			          	 	
				           		<li><a href="editprofile.php">Edit Profile</a></li>
				          	</ul>
				        </div>      
				    </div>
			    </div>
			</div>    
		</div>
</div>
  		<!--// Mini Header \\-->
		<!--// Main Content \\-->
		<?php 
            $d=mysql_fetch_object(mysql_query("select * from student_tbl where studid=".$_SESSION["studid"]));
        ?>
		<div class="wm-main-content">

			<!--// Main Section \\-->
			<div class="wm-main-section">
				<div class="container">
					<div class="row">
						<aside class="col-md-4">
							 <div class="wm-student-dashboard-nav">
								 <div class="wm-student-nav">
									<figure>
										<div class="prof" style="background: #222845;width:80px; height: 80px;border-radius: 50%;text-align: center;">
											<h3 class="name" style="color: #fff;font-family: 'josefin slab',sans-serif;font-weight: bold;padding-top: 21px;font-size: 30px"></h3>
										</div>

									</figure>
									<div class="wm-student-nav-text" style="padding-top: 25px;margin-bottom: 100px;">
										<h6 id="uname"><?= $d->fname." ".$d->lname?></h6>
										<!-- 	<a href="#">Update image</a>
										<input style="position:relative;top:-90px;opacity:0;cursor:pointer;padding:25px;" type="file" id="example-email" name="file1" class="form-control" placeholder="Photo" data-bvalidator="required">
							            <input name="himg" type="hidden" value="<?= $file1; ?>">
										 -->										
									</div>
									<ul>
										<li class="active">
											<a href="javascript:void(0)" class="pd">
												<i class="wmicon-avatar"></i>
												Profile Details
											</a>
										</li>
										<li>
											<a href="javascript:void(0)" class="ep">
												<i class="wmicon-pen"></i>
												Edit profile
											</a>
										</li>
										<li>
											<a href="javascript:void(0)" class="cp">
												<i class="wmicon-three"></i>
												Change Password
											</a>
										</li>
										<li>
											<a href="pages/logout.php">
												<i class="wmicon-arrow"></i>
												Logout
											</a>
										</li>
									</ul>
								</div>
							</div>							
						</aside>
						<div class="col-md-8">
							<div class="wm-student-profile-info">
								<div class="wm-student-dashboard-profile">
									<div class="wm-plane-title">
										<h2 class="hedn">About Me</h2>									
									</div>
									<ul class="row">
										<li class="col-md-3">
											<div class="wm-student-profile">
												<a class=wm-circle-icon href="#"><i class="wmicon-pen"></i></a>
												<div class="wm-student-profile-text">
													<span>Rollno</span>
													<a href="#"><?= $d->rollno?></a>
												</div>
											</div>
										</li>
										<li class="col-md-6">
											<div class="wm-student-profile">
												<a class=wm-circle-icon href="#"><i class="wmicon-web2"></i></a>
												<div class="wm-student-profile-text">
													<span>Email:</span>
													<a href="#"><?= $d->username?></a>
												</div>
											</div>
										</li>
										<li class="col-md-3">
											<div class="wm-student-profile">
												<a class=wm-circle-icon href="#"><i class="fa fa-graduation-cap"></i></a>
												<div class="wm-student-profile-text">
													<span>SEMESTER</span>
													<a href="#"><?= $_SESSION["ssem"] ?></a>
												</div>
											</div>
										</li>
									</ul>
									<div class="col-md-12" id="edit-pro">
                                            <!-- ajax content load hear -->
                                    </div>								
								</div>
							</div>									
						</div>
					</div>
				</div>
			</div>
</div>
<?php include("pages/footer.php");?>
<script>
	$(document).ready(function() {
		//---first latter on profile
		var string = $('#uname').text();
		var text = string.split(" ");
		$('.name').text(text[0].charAt(0) + text[1].charAt(0));

		//---default load content
		$('#edit-pro').load('./ajax/editp1.php');

		//---add and remove class function
		function active(link){
			$(link).parent().addClass('active').prevAll('li').removeClass('active');
			$(link).parent().nextAll('li').removeClass('active');
		}
		//---left menu click events....
		$('.pd').on('click', function() {
			$('#edit-pro').load('./ajax/editp1.php');
			active(this);
			$('.hedn').text('About Me');			
		});

		$('.ep').on('click', function() {
			$('#edit-pro').load('./ajax/editp2.php');
			active(this);
			$('.hedn').text('Edit Profile');		
		});

		$('.cp').on('click', function() {
			$('#edit-pro').load('./ajax/editp3.php');
			active(this);
			$('.hedn').text('Change Password');		
		});
	});
</script>