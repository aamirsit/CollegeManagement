<body style="overflow: hidden;">
    <div id="overlay" style="position: fixed;width: 100%;height: 100vh; background: #fff;">
        <div class="circle" style="position: absolute;top: calc(50% - 130px);left: calc(50% - 80px);box-shadow: 0 0px 20px rgba(0,0,0,0.19), 0 0px 6px rgba(0,0,0,0.23);width:150px;height: 150px;border-radius: 50%;padding: 35px 0 0 50px;">
            <img src="./images/iqra.png" width="50" height="auto" alt="">
            <span style="position:absolute;top: 200px;left: calc(0px - 30px);width: 250px;font-size: 25px;">IQRA BCA COLLEGE</br><p style="font-size: 15px;padding-left: 80px;"><img src="./images/giphy.gif" alt="" width="60"></p></span>

        </div>

    </div>
    <!--// Main Wrapper \\-->
    <div class="wm-main-wrapper" style="display: none;">
        
        <!--// Header \\-->
        <header id="wm-header" class="wm-header-one">

            <!--// TopStrip \\-->
            <div class="wm-topstrip">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- <div class="wm-language"> <ul> <li><div style="height:40px;overflow: hidden;" id="google_translate_element"></div><script type="text/javascript">function googleTranslateElementInit() { new google.translate.TranslateElement({pageLanguage: "en"}, "google_translate_element"); }</script><script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></li></ul> </div> -->
                            <ul class="wm-stripinfo">
                                <li><i class="wmicon-location"></i>Dahegam-Dahej Road,Bharuch. Pin - 392240</li>
                                <li><i class="wmicon-technology4"></i>(02642) 653882 / 223483</li>
                                <li><i class="wmicon-clock2"></i> Mon - Sat: 9:00am - 3:00pm</li>
                            </ul>
                            <ul class="wm-adminuser-section">
                                <li><a href="../admin/login.php" >Staff Corner</a></li>
                                <li>
                                    <?php if(!isset($_SESSION["studid"])){?>
                                    <a id="re-login" href="#" data-toggle="modal" data-target="#ModalLogin">Student login</a>
                                    <?php }else {?>
                                        <li><a href="pages/logout.php">Log out</a></li>
                                    <?php }?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--// TopStrip \\-->
<!--// MainHeader \\-->
            <div class="wm-main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3"><a href="index.php" class="wm-logo"><img src="images/logo-1.png" width="auto" height="75" alt=""></a></div>
                        <div class="col-sm-9">
                            <!--// Navigation \\-->
                            <nav class="navbar navbar-default">
                                <div class="navbar-header">
                                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="true">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                  </button>
                                </div>
                                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                  <ul class="nav navbar-nav" id="loadh">
                                   <?php if(!isset($_SESSION["studid"])){?>
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <li><a href="event.php">event</a></li>
                                    <li ><a href="news.php">News</a></li>
                                    <li class="wm-megamenu-li"><a href="faculty.php">Faculty</a></li>
                                    <li><a href="gallery.php">Gallery</a></li>
                                    <li><a href="about-us.php">About</a></li>
                                    <li><a href="contact-us.php">Contact</a></li>
                                                                            
                                    <?php } if(isset($_SESSION["studid"])){
                                        
                                        $r=mysql_query("select * from student_tbl where studid='".$_SESSION["studid"]."'");
                                        $r1=mysql_fetch_object($r);?>
                                    
                                            <li><a href="marks.php">Marks</a></li>
                                            <li><a href="attendance.php">Attendence</a></li>
                                            <li><a href="editprofile.php">Profile</a></li>
                                            <li style="margin-top: -15px; height: 130px;"><a href="" style="color:#B99663;"><?= $r1->fname. " " .$r1->lname ?><img style="margin-left: 20px;border-radius: 50%;" src="<?php if($r1->photo == ""){echo "./images/student-6-512.png";}else{echo "../faculty/uploadimage/$r1->photo";}?>" width="50" height="50"></a></li>
                                    <?php } ?>
                                  </ul>
                                </div>
                            </nav>
                            <!--// Navigation \\-->

                        </div>
                    </div>
                </div>
            </div>
            <!--// MainHeader \\-->
