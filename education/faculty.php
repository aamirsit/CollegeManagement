<?php include("DatabaseFiles/cn.php");?>
<?php include("pages/head.php");?>
<?php include("pages/header.php");?>

<!--// Mini Header \\-->
		<div class="wm-mini-header">
			<span class="wm-blue-transparent"></span>
			 <div class="container">
			    <div class="row">
				    <div class="col-md-12">
				        <div class="wm-mini-title">
				       		<h1>Our professors</h1> 
				        </div>
				        <div class="wm-breadcrumb">
				          	<ul>
				          	 	<li><a href="index.php">Home</a></li>
				           		<li>Our Professors</li>
				          	</ul>
				        </div>      
				    </div>
			    </div>
			</div>    
		</div>
  		<!--// Mini Header \\-->

		<!--// Main Content \\-->
		<div class="wm-main-content">

			<!--// Main Section \\-->
			<div class="wm-main-section">
				<div class="container">
					<div class="row">	
						<div class="wm-our-professors">
							<ul class="row">
								<?php $r=mysql_query("select * from faculty_tbl where fid!=1");
									while($r1=mysql_fetch_object($r)){?>
								<li class="col-md-2 wordpress">
									<figure>
										<a href="#"><img style="width:150px;height:150px;border-radius:50%;" src="../faculty/uploadimage/<?= $r1->photo?>" alt=""></a>											
									</figure>
									<div class="wm-team-info">
										<h6><a href="#">Prof. <?= $r1->fname." ".$r1->lname?></a></h6>				
										<span>@ Iqra BCA College</span>
									</div>
								</li><?php }?>
							</ul>
						</div>						
					</div>
				</div>
			</div>
			<!--// Main Section \\-->

		</div>
		<!--// Main Content \\-->
		<?php include("pages/footer.php");?>