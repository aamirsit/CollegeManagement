<?php if(isset($_REQUEST["eid"]))	
	{
			$r=mysql_fetch_object(mysql_query("select * from $table where $pk=".$_REQUEST["eid"]));
	}
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<?php include('page_content/head.php') ?>
<body class="header-fixed-top">
<?php include('page_content/left-side.php') ?>
<?php include('page_content/right-side.php') ?>
<div id="page-container" class="full-width">
<?php include('page_content/header.php') ?>
<div id="fx-container" class="fx-opacity">
<div id="page-content" class="block" style="min-height:618px;">
	<div class="block-header">
		<a href="" class="header-title-link">
			<h1>
				<i class="icon-wrench animation-expandUp"></i><?= $nm?> Form <br>
			</h1>
		</a>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><i class="icon-edit"></i></li>
		<li>Forms</li>
		<li><a href="#"><?= $nm?></a></li>
	</ul>
