<?php include("DatabaseFiles/cn.php");?>
<?php include("pages/head.php");?>
<?php include("pages/header.php");?>
<?php include("pages/time.php");?>
<?php if(isset($_SESSION["studid"]))
    {
        echo "<script type='text/javascript'>
        function preventBack() {
            window.history.forward();
        }
        setTimeout('preventBack()',0);location.href='marks.php'</script>";
    }?>
<!--// Mini Header \\-->
        <div class="wm-mini-header">
            <span class="wm-blue-transparent"></span>
             <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wm-mini-title">
                            <h1>Event's</h1> 
                        </div>
                        <div class="wm-breadcrumb">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>event</li>
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
                        <div class="col-md-8 col-md-offset-2">
                            <div class="wm-courses wm-courses-popular wm-courses-mediumsec">
                                <ul class="row">
                                    <?php $r=mysql_query("Select * From event_tbl where enabled='Y' AND edate <= CAST(CURRENT_TIMESTAMP AS DATE) order by edate DESC");
                                while($r1=mysql_fetch_object($r)){
                                     $img=explode(",", $r1->photo);   
                                    ?>
                                    <li class="col-md-12">
                                        <div class="wm-courses-popular-wrap" style="max-height: 265px;min-height: 265px;">
                                            <figure style="max-height: 265px;overflow: hidden;"> <a href="event-detail.php?eid=<?=$r1->eid?>"><img id="eventimg" style="height: 265px;" src="../faculty/uploadimage/<?= $img[0]?>" alt=""><span class="wm-popular-hover"> <small>More Detail</small> </span> </a>
                                            </figure>
                                            <div class="wm-popular-courses-text">
                                                <h6><a href="#"><?=$r1->name?></a></h6>
                                                <p><?php $des=substr("$r1->description",0,200); echo $des?></p>
                                                <div class="wm-courses-price"><span></span></div>
                                                <ul style="position: relative;top: 90%;">
                                                    <li><a href="#" class="wm-color"><i class="wmicon-time2"></i> <?= time_elapsed_string($r1->edate)?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

		</div>
<?php include("pages/footer.php");?>
<style>
    .maxpop{
        width: 100%;
        height: 100vh;
        background: rgba(0,0,0,0.1);
        position: fixed;
        display: none;
        z-index: 99;
    }
    .mainbody{
        width: 70%;
        height: 700px;
        background: #fff;
        border-radius: 10px;
        margin-left: calc(50% - 35%);
        margin-top: 20px;
        box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
        overflow:hidden; 
    }
</style>
<div class="maxpop">
    <div class="mainbody">
        <div class="popheader">
            <div class="row">
                <div class="col-md-6">
                    <img src="./extra-images/conservatory-bg.jpg" height="700px" alt="">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12"><spn>Check event</spn></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus maxime facere, ea enim et temporibus accusantium dolorem voluptatum. Voluptates pariatur consequatur, expedita laboriosam voluptas sequi. Sint consequatur hic, quibusdam rerum?</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>