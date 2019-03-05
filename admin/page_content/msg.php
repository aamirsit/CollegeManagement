<?php
        if(isset($_REQUEST['success']))
           {?>
              <style>
                  .con{
                      display: block;
                  }  
              </style> 
              <script>
                $(document).ready(function() {
                    setTimeout(function(){
                       $('.con').addClass('animated slideOutRight');
                    },3000);
                    setTimeout(function(){
                         $('.con').css('display','none');
                    },3500);
                    setTimeout(function(){
                        $('.close').toggleClass('animated bounce'); 
                    },500);  
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
                <div class="alert alert-success alert-dismissable" style="height:40px;padding-top:3px;">
                    <a class="close" aria-hidden="true" ><i class="icon-smile i" style="font-size:1.7em;color:darkgreen"></i></a>
                    <h5><i class="icon-ok"></i> Your Request is Successful!</h5>
                </div>
            </div>
        </div>
    </div>
    