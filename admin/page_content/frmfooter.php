<?php include('page_content/footer.php') ?>
</div>
</div>
<a href="javascript:void(0)" id="to-top"><i class="icon-angle-up"></i></a>
<script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.10.2.min.js"%3E%3C/script%3E'));</script>
<script src="js/vendor/bootstrap.min-1.03.js"></script>
<script src="js/plugins-1.03.js"></script>
<script src="js/main-1.03.js"></script>
<script type="text/javascript"> $(document).ready(function () { $('#form1').bValidator(); }); </script>
<div class="pop animated slideInRight" style="z-index:99;text-align:center;background:;display:flex;opacity:0;position: fixed;top:80%;left:75%;visibility:hidden">
    <div class="msg" style="padding-top:12px;width:250px;height:50px auto;background-color:#222843;border-top-left-radius:5px;border-bottom-left-radius:5px;font-size:18px;color:#FFE">
    </div>     
    <div class="ic" style="padding-top:12px;width:50px;height:50px;border-top-right-radius:5px;border-bottom-right-radius:5px;background-color:#90D473;font-size:1.5em;color:#FFE">
    <i class="icon-smile" style="font-size:1.5em;"></i>
    </div>  
</div>
<script>
    function pops(msg,icon){
                $('.pop').css('visibility','visible');
                //variable for function
                var string = $('#uname').text(),text = string.split(" "),name = text[1];
                var red = "#ef8989",green = "#90d473",blue = "#83c6e4";

                if(icon == "error") {
                    $('.msg').text(msg);
                    $('.pop i').attr('class', "icon-ban-circle");
                    var he = $('.msg').height();
                    $('.ic').css({background:red,'padding-top': he/2-3+"px"}).height(he);
                    $('.pop').css({'display':'flex','opacity':'1'});
                    setTimeout(function(){
                       $('.pop').addClass('animated slideOutRight');
                    },3000);
                    $('.pop').delay(3500).fadeOut();
                }else if(icon == "success") {
                    $('.msg').text(msg);
                    $('.pop i').attr('class', "icon-smile");
                     var he = $('.msg').height();
                    $('.ic').css({background:green,'padding-top': he/2-3+"px"}).height(he);

                    $('.pop').css({'display':'flex','opacity':'1'});
                    setTimeout(function(){
                       $('.pop').addClass('animated slideOutRight');
                    },3000);
                    $('.pop').delay(3500).fadeOut();
                }else {
                    $('.msg').text(msg);
                    $('.pop i').attr('class', "icon-exclamation");
                     var he = $('.msg').height();
                    $('.ic').css({background:blue,'padding-top': he/2-3+"px"}).height(he);
                    $('.pop').css({'display':'flex','opacity':'1'});
                    setTimeout(function(){
                       $('.pop').addClass('animated slideOutRight');
                    },3000);
                    $('.pop').delay(3500).fadeOut();
                }
            }
</script>
</body>
</html>