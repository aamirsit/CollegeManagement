<?php 
if(isset($_REQUEST["did"])) {
		$db->delete($table,$pk,$_REQUEST["did"]);
		echo "<script>location.href='".$nm."_list.php'</script>";
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
		<div id="fx-container" class="fx-opacity"><div id="page-content" class="block full">
			<div class="block-header">
				<a href="#" class="header-title-link">
					<h1>
						<i class="icon-thumbs-up-alt animation-expandUp"></i><?= $nm?> Information<br>
					</h1>
				</a>
			</div>