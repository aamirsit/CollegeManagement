<!--// Footer \\-->
<style>
    label {
        cursor: pointer;
        padding: 6px 21px;
        /* Style as you please, it will become the visible UI component. */
    }
    #avtar{
        opacity: 0;
        position: absolute;
        z-index: -1;
    }
    .file{
        background: #f0eef0;
    }
    .a a{
        margin-left: 40px;
    }
</style>
		<footer id="wm-footer" class="wm-footer-one">

            <!--// FooterWidgets \\-->
            <!-- <div class="wm-footer-widget">
                <div class="container">
                    <div class="row">
                        <aside class="widget widget_archive col-sm-2">
                            <div class="wm-footer-widget-title"> <h5>Quick Links</h5> </div>
                            <ul>
                               <?php if(!isset($_SESSION["studid"])){?>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="event.php">Event</a></li>
                                <li><a href="news.php">News</a></li>
                                <li><a href="faculty.php">Faculty</a></li>
                                <li><a href="contact-us.php">About</a></li>
                                <?php }else{ ?>
                                <li><a href="marks.php">Marks</a></li>
                                <li><a href="attendance.php">Attendence</a></li>
                                <li><a href="editprofile.php">Profile</a></li>
                                <?php } ?>
                            </ul>
                        </aside>
                        <aside class="widget widget_contact_info col-sm-3 col-sm-offset-1">
                            <div class="wm-footer-widget-title"> <h5>Latest News</h5> </div>
                            <ul>
                                <?php $r=mysql_query("Select * From news_tbl where ndate >= CAST(CURRENT_TIMESTAMP AS DATE) order by ndate LIMIT 1");
                                        while($r1=mysql_fetch_object($r)){?>
                                <li><a href="news-detail.php?eid=<?=$r1->nid?>"><?=$r1->name?><img style="margin-top: -20px;" src="./images/new.gif" width="30" alt=""></a></li>
                                <?php }?>
                            </ul>
                        </aside>
                        <aside class="widget widget_contact_info col-sm-3">
                            <div class="wm-footer-widget-title"> <h5>Latest Event</h5> </div>
                            <ul>
                                <?php $r=mysql_query("Select * From event_tbl where edate <= CAST(CURRENT_TIMESTAMP AS DATE) order by edate DESC LIMIT 1");
                                while($r1=mysql_fetch_object($r)){?>
                                <li><a href="event-detail.php?eid=<?=$r1->eid?>"><?=$r1->name?><img style="margin-top: -20px;" src="./images/new.gif" width="30" alt=""></a></li>
                                <?php }?>
                            </ul>
                        </aside>
                        <aside class="widget widget_contact_info col-sm-3">
                            <a href="index-2.html" class="wm-footer-logo"><img src="images/logo-1.png" alt=""></a>
                            <ul>
                                <li><i class="wm-color wmicon-pin"></i> Dahegam, Dahej Road, Bharuch. </li>
                                <li><i class="wm-color wmicon-phone"></i> (02642)223484 <br> (02642)653882 </li>
                                <li><i class="wm-color wmicon-letter"></i> <a href="mailto:name@email.com">info@university.com</a> <a href="mailto:name@email.com">support@university.com</a></li>
                            </ul>
                            <div class="wm-footer-icons">
                                <a href="https://m.facebook.com/IqraBcaCollege/" class="wmicon-social5"> Facebook</a> 
                            </div>
                        </aside>
                    </div>
                </div>
            </div> -->
            <!--// FooterWidgets \\-->

            <!--// FooterCopyRight \\-->
            <div class="wm-copyright">
                <div class="container">
                    <div class="row">
                       <!--  <div class="col-sm-3">weather widget start<div id="m-booked-small-t3-69442" style="margin-left: -400px"> <div class="booked-weather-160x36 w160x36-01" style="color:#333333; border-radius:0px; -moz-border-radius:0px; border:none;"> <a target="_blank" style="color:#08488D;margin-left: -200px;" href="http://www.booked.net/weather/bharuch-47512" class="booked-weather-160x36-city">Bharuch</a> <a target="_blank" class="booked-weather-160x36-right" href="http://www.booked.net/"><img src="//s.bookcdn.com/images/letter/s5.gif" alt="Book Your Hotel - booked.net" /></a> <div class="booked-weather-160x36-degree"><span class="plus">+</span>39&deg;<span>C</span></div> </div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/bw-160-36.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-small-t3-69442'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=47512&type=13&scode=124&ltid=3457&domid=w209&anc_id=23784&cmetric=1&wlangID=1&color=fcfcfc&wwidth=158&header_color=fff5d9&text_color=333333&link_color=08488D&border_form=2&footer_color=fff5d9&footer_text_color=333333&transparent=1"></script>weather widget end </div> -->
                        <div class="col-sm-8 a">
                            <?php if(!isset($_SESSION["studid"])){?>
                                <a href="index.php">Home</a>
                                <?php $r=mysql_query("Select * From event_tbl where enabled='Y' AND edate <= CAST(CURRENT_TIMESTAMP AS DATE) order by edate DESC LIMIT 1");
                                if(mysql_num_rows($r)>0){
                                while($r1=mysql_fetch_object($r)){?>
                                <a href="event.php">Event<img style="margin-top: -20px;" src="./images/new.gif" width="20" alt=""></a>
                                <?php }}else{?>
                                <a href="event.php">Event</a><?php }?>
                                <?php $r=mysql_query("Select * From news_tbl where enabled='Y' AND ndate >= CAST(CURRENT_TIMESTAMP AS DATE) order by ndate LIMIT 1");
                                if(mysql_num_rows($r)>0){
                                while($r1=mysql_fetch_object($r)){?>
                                <a href="news.php">News<img style="margin-top: -20px;" src="./images/new.gif" width="20" alt=""></a>
                                <?php }}else{?>
                            <a href="news.php">News</a><?php }?>
                                <a href="gallery.php">Gallery</a>
                                <a href="faculty.php">Faculty</a>
                                <a href="about-us.php">About</a>
                                <a href="contact-us.php">Contact</a>
                                <?php }else{ ?>
                                <a href="marks.php">Marks</a>
                                <a href="attendance.php">Attendence</a>
                                <a href="editprofile.php">Profile</a>
                                <?php } ?>
                        </div>
                        <div class="col-sm-4"> <p>© 2018, All Right Reserved - by <a href="#" class="wm-color">IQRA COLLEGE</a></p> </div>
                    </div>
                </div>
            </div>
            <!--// FooterCopyRight \\-->

		</footer>
		<!--// Footer \\-->

        <div class="clearfix"></div>
    </div>
    <!--// Main Wrapper \\-->

    <!-- ModalLogin Box -->
    <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 500px;">
          <div class="modal-body">
            
            <div class="wm-modallogin-form wm-login-popup" id="s" style="display:;">
                <span class="wm-color">Login to Your Account</span>
                <form>
                    <ul>
                        <li><small>Email ID</small> <input id="eid" type="email" value="" placeholder="Email ID" style="width:100%;padding: 8px 12px;height: 43px;"> </li>
                        <li> <small>Password</small><input id="pass" type="password" value="" placeholder="Password"> </li>
                        <li> <a href="#" id="forpass" class="wm-forgot-btn" data-toggle="modal" data-target="#ModalSearch">Forgot Password?</a> </li>
                        <li style="display: none;" class="msgl"></li>
                        <li> <input id="login1"  type="button" value="Sign In"> </li>
                    </ul>
                </form>
                <p>Not Registered yet? <a id="signin" href="#">Sign-up Now!</a></p>
              </div>
            <!------------------------------------------------------------------>
            <div class=" off wm-modallogin-form wm-register-popup" id="s1" style="display: all;">
                <span class="wm-color">create Your Account step 1</span>
                <form id="enfor">
                    <ul><small>Enrollment ID</small>
                        <li> <input id="enr" type="text" value="Enrollment ID" onblur="if(this.value == '') { this.value ='Enrollment ID'; }" onfocus="if(this.value =='Enrollment ID') { this.value = 'E'; }"> </li>
                        <li style="display: none;background:none;color:red;" class="msg"></li>
                        <li> <input id="next1" type="button" value="Next"> </li>
                    </ul>
                </form>
                <p>Already a member? <a href="#" data-toggle="modal" data-target="#ModalLogin">Sign-in Here!</a></p>
            </div>

            <div class="wm-modallogin-form wm-register-popup" id="s2" style="display:none;">
                <span class="wm-color" id="sinfo"></span>
                <form id="userinfo" enctype="multipart/form-data">
                    <ul>
                        <li ><bdi id="roll"></bdi><bdi id="ady" style="margin-left: 40%;"></bdi></li>
                        
                        <li>
                            <small>Fill Your More Detail</small>
                        </li>
                        <li><small>Gender</small>
                            <select name="gender" type="text" id="gender" onblur="if(this.value == '') { this.value ='Gender'; }" onfocus="if(this.value =='Gender') { this.value = ''; }">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                         </li>
                        <li> <small>Date Of Birth</small>
                            <input name="dob" type="date" id="dob" style="width:100%;padding: 8px 12px;height: 43px;">
                        </li>
                        <li> <small>E-mail ID</small>
                            <input name="email" type="text" id="username" value="" placeholder="Email Address">
                        </li>
                        <li> <small>Password</small>
                            <input name="pass" type="password" id="password" value="" placeholder="Password">
                        </li>
                        <li> <small>Avtar</small>
                            <div class="file"><label for="avtar"><i class="fa fa-upload"></i>Upload your Image</label></div>
                            <input name="file" type="file" id="avtar" value="">
                        </li>
                        <input name="h" type="hidden" id="h">
                        <li style="display: none;" class="msg1"></li>
                        <li> <input type="submit" value="Next"> </li>
                    </ul>
                </form>
                <p id="back1" style="cursor: pointer;">Back to Step 1</p>
            </div>

            <div class="wm-modallogin-form wm-register-popup" id="s3" style="display: none;left">
                <span class="wm-color">create Your Account step 3</span>
                <form>
                    <ul>
                        <li>
                            <div class="wm-message wm-typography-element">
                                <div class="message success-message">
                                    <i class="fa fa-check-circle"></i>
                                    <p>Registration Successfull</br>You can't login until admin approves you!</br>Thank you</p>
                                </div>
                            </div>
                        </li>
                        <p><a href="#" id="login" data-toggle="modal" data-target="#ModalLogin">login</a></p>
                    </ul>
                </form>
            </div>
          </div>
        </div>
      <div class="clearfix"></div>
      </div>
    </div>
    <!-- ModalLogin Box -->

    <!-- ModalSearch Box -->
    <div class="modal fade" id="ModalSearch" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            
            <div class="wm-modallogin-form">
                <span class="wm-color">Forgot Password</span>
                <form id="fpf">
                    <ul>
                         <li><small>Email ID</small> <input name="eidfp" id="eidfp" type="email" value="" placeholder="Email ID" style="width:100%;padding: 8px 12px;height: 43px;"> </li>
                        <li> <small>Date of Birth</small><input name="dobfp" id="dobfp" type="date" style="width:100%;padding: 8px 12px;height: 43px;"> </li>
                        <li> <input id="getpass"  type="button" value="Get Password"> </li>
                        <li style="display: none;font-size: 14px;" class="msgfp"></li>
                        <li id="loading" style="display: none;">Email Sending<img style="padding-top: 3px;" width="48" src="./images/giphy.gif" alt=""></li>
                    </ul>
                </form>
            </div>

          </div>
        </div>
      <div class="clearfix"></div>
      </div>
    </div>
    <!-- ModalSearch Box -->
    <!-- jQuery (necessary for JavaScript plugins) -->
    
    <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/modernizr.js"></script>
    <script type="text/javascript" src="script/bootstrap.min.js"></script>
    <script type="text/javascript" src="script/jquery.prettyphoto.js"></script>
    <script type="text/javascript" src="script/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="script/fitvideo.js"></script>
    <script type="text/javascript" src="script/skills.js"></script>
    <script type="text/javascript" src="script/slick.slider.min.js"></script>
    <script type="text/javascript" src="script/waypoints-min.js"></script>
    <script type="text/javascript" src="build/mediaelement-and-player.min.js"></script>
    <script type="text/javascript" src="script/isotope.min.js"></script>
    <script type="text/javascript" src="script/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="script/functions.js"></script>
    <script type="text/javascript" src="script/custom.js"></script>
    <script type="text/javascript" src="script/pops.js"></script>
    <script type="text/javascript" src="script/jquery.marquee.js"></script>
    <script>
        $(window).load(function(){
            $('#overlay').fadeOut(1000);
            $('body').fadeIn(200).css("overflow","");
            $('.wm-main-wrapper').fadeIn(2000).css('display',"block");
        });
    </script>
    <style>
        .pop{
            position: fixed;display: none;top: 85%;right: 5%;text-align: center;opacity:0;
            margin-right: -40px;
        }
        .msg{
            width: 250px;height: 50px;background: #222843;font-size: 18px;color:#ffe;border-top-left-radius: 5px;border-bottom-left-radius: 5px;padding-top: 12px;
        }
        .ic{
            width: 50px;height: 50px;background: #90d473;border-top-right-radius: 5px;border-bottom-right-radius: 5px;padding-top: 15px;color:#fff
        }
    </style>
    <div class="pop">
        <div class="msg">Successfully updated</div>
        <div class="ic"><i class=""></i></div>
    </div>

  </body>
</html>
<script>
    $("#userinfo").on('submit', function(e){
            e.preventDefault();
            var dob = $('#dob').val(),
            username = $('#username').val(),
            password = $('#password').val(),
            rollno = $('#roll').val();
    
            if(dob != "" && password.length >= 8 && username.length >= 8){
                
                $.ajax({
                    type: 'POST',
                    url: './ajax/update.php',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function(){
                        // $("#loader").css("display","");
                    },
                    success: function(data){
                        $('#userinfo')[0].reset();
                        $('#s1').css("display","none");
                        $('#s2').css("display","none");
                        $('#s3').css("display","");
                        
                    }
                });
            }else{
                $('.msg1').css("display","block");
                $('.msg1').css("color","red");
                $('.msg1').html("Insert data Properly</br>Username Must be 8 character</br>Password length Must be 8 character");
            }
        });
        //forgot password
        $('#getpass').click(function() {
            var email = $('#eidfp').val();
            var dob = $('#dobfp').val();
            
            if(email != "" && dob != "") {
                //ajax for sending mail
                $.ajax({
                    url: "./ajax/forgot.php",
                    type: "POST",
                    data: {email: email, dob: dob},
                    success: function(data) {
                        var sp = data.split(':');
                        
                        if(sp[0] == "1") {
                            send_mail(email,sp[1],'IQRA COLLEGE');
                            $('#fpf')[0].reset();
                        }else{
                            $('.msgfp').css('display','').html("Invalid EmailId or DOB");   
                        }
                    }
                });
            }else{
                $('.msgfp').css('display','').html("Enter vaid Data");   
            }
        });
        //mail function
        function send_mail(e,m,n)
        {
            //alert('hello');
            $.ajax({
               type: 'POST',
               url: 'http://mybws.online/FormMail/email.php?email='+e+'&message=Your Password Is :'+m+'&name='+n,
               beforeSend: function(){
                    $("#loading").css("display","");
                },
               success: function(data){
                   $("#loading").css("display","none");
                   $('.msgfp').css({'display':'',color: "green"}).html(data + " To your emailid = "+e);   
                }, error: function(jqXHR, textStatus, errorThrown){

              console.log(" The following error occured: "+ textStatus, errorThrown);
            }
            });
        }
</script>