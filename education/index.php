<?php include("DatabaseFiles/cn.php");?>
<?php include("pages/head.php");?>
<?php include("pages/header.php");?>
<?php include("pages/time.php");?>
<?php include("pages/timeleft.php");?>
<?php if(isset($_SESSION["studid"]))
    {
        echo "<script type='text/javascript'>
        function preventBack() {
            window.history.forward();
        }
        setTimeout('preventBack()',0);location.href='marks.php'</script>";
    }?>
<!--// Main Banner \\-->
<style>
    .imgiq{
        filter: hue-rotate(300deg);
        border-radius: 10px;
        transition: all 0.5s;
    }
    .imgiq:hover{
        filter: none;
        box-shadow: 0 10px 30px -5px rgba(0,0,0,0.19), 0 10px 10px -5px rgba(0,0,0,0.23);
        transform: translateY(-5px);
    }
    i{
        transition: all 200ms ease-in-out;
        padding-left: 5px;
    }
    .wm-banner-btn:hover i{
        transform: translateX(15px);
    }
</style>
<section>
		<div class="wm-main-banner">
            
            <div class="wm-banner-three">
                <div class="wm-banner-three-layer">
                    <img style="filter:hue-rotate(300deg);" src="extra-images/1.jpg" alt="">
                    <div class="wm-caption-three">
                        <div class="container">
                            <div class="wm-caption-three-inner">
                                <h1>Students <span>don’t</span> just attend our College.</h1>
                                <p>They discover diverse opportunities to develop talents, & become leaders, to have an impact on our campus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wm-banner-three-layer">
                    <img style="filter:hue-rotate(300deg);" src="extra-images/2.jpg" alt="">
                    <div class="wm-caption-three">
                        <div class="container">
                            <div class="wm-caption-three-inner">
                                <h1>Are you <span>one</span> of the best students here?</h1>
                                <p>BCA for School Leaver, Graduate, Mature and Technology applicants.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wm-banner-three-layer">
                    <img style="filter:hue-rotate(300deg);" src="extra-images/3.jpg" alt="">
                    <div class="wm-caption-three">
                        <div class="container">
                            <div class="wm-caption-three-inner">
                                <h1>Why <span>don’t</span> start the hard study?</h1>
                                <p>Computer science is the study of computers and their uses, and the field comprises a wide range of subjects.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		</div>
		</section>
            <!--// Main Section \\-->
            <div class="wm-main-section wm-news-grid-full" style="background: #fff;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Latest Event</h2>
                            <div class="wm-event-latest-slider" style="max-height:226px;">
                                    <?php $r=mysql_query("Select * From event_tbl where enabled='Y' AND edate <= CAST(CURRENT_TIMESTAMP AS DATE) order by edate DESC LIMIT 3");
                                        if(mysql_num_rows($r)>0){
                                        while($r1=mysql_fetch_object($r)){
                                        $img=explode(",", $r1->photo);
                                    ?>
                                        <div class="wm-event-latest-layer">
                                            <img width="150" height="100" src="../faculty/uploadimage/<?=$img[0]?>" alt="" style="float: left;padding-right: 15px;">
                                            <h2 style="padding: 20px 0 15px 0;background-color:#F7F7F7"><?= $r1->name ?></h2>
                                            <p style="margin-top:-7px;background-color:#F3F3F3"><?= $r1->edate?><span style="padding-left: 170px;float: right;"><?= time_elapsed_string($r1->edate) ?></span></p>
                                           <!--  <h6 class="wm-color" style="padding-top: 20px;text-align: justify;"><?php $des=substr("$r1->description",0,100); echo $des; ?></h6> -->
                                            <a href="event-detail.php?eid=<?=$r1->eid?>" class="wm-banner-btn">Read more <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    <?php } }else{?>
                                    <h1>No Recent Events</h1>
                                    <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                            <h2>Latest News</h2>
                            <div class="wm-event-latest-slider" style="max-height:226px;">
                                    <?php $r=mysql_query("Select * From news_tbl where enabled='Y' AND ndate >= CAST(CURRENT_TIMESTAMP AS DATE) order by ndate DESC LIMIT 3");
                                        if(mysql_num_rows($r)>0){
                                        while($r1=mysql_fetch_object($r)){
                                        $img=explode(",", $r1->photo);
                                    ?>
                                        <div class="wm-event-latest-layer">
                                            <img width="150" height="100" src="../faculty/uploadimage/<?=$img[0]?>" alt="" style="float: left;padding-right: 15px;">
                                            <h2 style="padding: 20px 0 15px 0;background-color:#F7F7F7"><?= $r1->name ?></h2>
                                            <p style="margin-top:-7px;background-color:#F3F3F3"><?= $r1->ndate?><span style="padding-left: 170px;float: right;"><?= time_elapsed_string_left($r1->ndate) ?></span></p>
                                            <!-- <h6 class="wm-color" style="padding-top: 20px;text-align: justify;"><?php $des=substr("$r1->description",0,100); echo $des; ?></h6> -->
                                            <a href="news-detail.php?eid=<?=$r1->nid?>" class="wm-banner-btn">Read more <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    <?php } }else{?>
                                    <h1>No Recent News</h1>
                                    <?php } ?>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
<?php include("pages/footer.php");?>
<script>
    $('.marquee').marquee();
</script>