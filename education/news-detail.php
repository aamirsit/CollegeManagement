<?php include("DatabaseFiles/cn.php");?>
<?php include("pages/head.php");?>
<?php include("pages/header.php");?>
<!-- Light Gallery Plugin Css -->
<link href="new/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
<!--// Mini Header \\-->
        <div class="wm-mini-header">
            <span class="wm-blue-transparent"></span>
             <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wm-mini-title">
                            <h1>Our News</h1> 
                        </div>
                        <div class="wm-breadcrumb">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="event.php">News</a></li>
                                <li>Single news</li>
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
                        <?php if(isset($_REQUEST["eid"])){
                            $eid=$_REQUEST["eid"];
                            $r1=mysql_fetch_object(mysql_query("select * from news_tbl where nid=".$eid));
                            $img = explode(',',$r1->photo);
                         ?>
                        <div class="col-md-12 ">
                            <!--// Editore \\-->
                            <div class="wm-detail-editore wm-custom-space">
                                <h3><?= $r1->name?></h3>
                                <?= $r1->description?>
                            </div>
                            <!--// Editore \\-->
                        </div>
                        <?php }else{
                            echo "No News Details available";}?>
                        
            </div>
            <section class="content">
            <!-- Image Gallery -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small>Photos Taken</small>
                            </h2>
                        </div>
                        <div class="body">
                          <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                           <?php 
                            for($i=0;$i<count($img)-1;$i++)
                            {?>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                                    <a href="../faculty/uploadimage/<?= $img[$i]?>" data-sub-html="<?= $r1->name?>">
                                        <img class="img-responsive thumbnail" src="../faculty/uploadimage/<?= $img[$i]?>">
                                    </a>
                                </div>        
                            <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
                </div>
            </div>
        </div>
<?php include("pages/footer.php");?>

  <!-- 
   <style>
    .overlay{
        height: 100vh;
        width: 100%;
        background: rgba(0,0,0,0.3);
        display: none;
        position: fixed;
    }
    .display{
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
        position: relative;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
    }
</style>
<div class="overlay">
    <div class="display">
        <img  id="img" src="" alt="">
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.images > img').click(function() {
            var img = $(this).attr('src');
            var height = $(this).prop('naturalHeight');
            var width = $(this).prop('naturalWeight');
            $('.overlay').css('display','flex');
            $('.display').css({'width':width,'height':height}).addClass('animated fadeIn');
            $(".display > img").attr('src',img);            
        });
        $('.overlay').click(function() {
            $('.overlay').css('display','none');
        });
    });
</script>                   -->
<script src="new/plugins/light-gallery/js/lightgallery-all.js"></script>
    <!-- Custom Js -->
<script src="new/js/pages/medias/image-gallery.js"></script>