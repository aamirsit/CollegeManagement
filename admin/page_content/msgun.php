<?php
        if(isset($_REQUEST['un']))
           {?>
              <style>
                  .con{
                      display: block;
                  }  
              </style> 
              <script>
                $(document).ready(function() {
                    $('.close1').click(function(){
                         $('.con').addClass('animated slideOutRight');
                        setTimeout(function(){
                         $('.con').css('display','none');
                         location.href='attendence_form.php';
                        },500);
                    });
                    /*setTimeout(function(){
                       $('.con').addClass('animated slideOutRight');
                    },3000);*/
                    
                });
            </script>
           <?php }else{?>
              <style>
                  .con{
                      display:none;
                  }  
              </style> 
           <?php }
    ?>
    <div class="container con animated slideInRight" style="position:relative;margin-top:-5%;">
        <div class="row">
            <div class="col-md-3 pull-right ">
                <div class="alert alert-danger alert-dismissable" style="height:40px;padding-top:3px;">
                   <button type="button" class="close1 pull-right" style="font-size:2em;color:grey;background:transparent;border:none;outline:none;" >×</button>
                    <h5><i class="icon-ban-circle"></i> Oops..already done!</h5>
                </div>
            </div>
        </div>
    </div>