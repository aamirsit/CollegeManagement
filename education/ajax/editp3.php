<div class="wm-contact-form">
    <form id="cpass">
        <ul>
            <li>
                <i class="fa fa-unlock-alt"></i>
                <input id="cp" type="password" value="" placeholder="Old Password">
            </li>
            <li>
                <i id="loc1" class="fa fa-unlock-alt "></i>
                <input id="np" type="password" value="" disabled placeholder="New Password">
            </li>
            <li>
                <i id="loc2" class="fa fa-unlock-alt"></i>
                <input id="cnp" type="password" value="" disabled placeholder="Re-enter Password">
            </li>
            <li> <input  id="cpb" type="button" value="Submit" disabled><img id="load" style="display:none" src="./images/loading29.gif" alt=""> </li>
        </ul>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#cp').blur(function() {
            var val = $(this).val();
            $.ajax({
                url: "./ajax/checkpass.php",
                type: "POST",
                data:{pass: val},
                success: function(data) {
                    if(data == 1){
                        pops("Now! change password","success");            
                        $('#np,#cnp').prop('disabled',false).css('border-bottom','2px solid #90d473');
                        $('#cpb').prop('disabled',false);
                        $('#loc1,#loc2').attr('class', "fa fa-unlock").css('color','#90d473');
                    }else{
                        pops("wrong password","error");
                        $('#np,#cnp').prop('disabled',true).css('border-bottom','2px solid #ef8989');
                        $('#cpb').prop('disabled',true);
                        $('#loc1,#loc2').css('color','#ef8989');
                    }
                }
            });
        });

        $('#cpb').click(function() {
            var newpass = $('#np').val(),rnewpass = $('#cnp').val();
            if(newpass == "" && rnewpass == "") {
                pops("All Feild requirde","error");
                $('#np,#cnp').css('border-bottom','2px solid #ef8989');
            }else{
                if(newpass.lenght >= 8 && rnewpass.lenght >= 8){
                    pops("Password lenght must be 8","error");
                    $('#np,#cnp').css('border-bottom','2px solid #ef8989');
                }else{
                    if(newpass !== rnewpass) {
                        pops("Password not match","error");
                        $('#cnp').css('border-bottom','2px solid #ef8989');
                    }else{
                        $('#cnp').css('border-bottom','2px solid #90d473');
                        $.ajax({
                            url: "./ajax/cp.php",
                            type: "post",
                            data: {pass: newpass},
                            success: function(data) {
                                if(data == 1) {
                                    pops("Password Updated","success");
                                    $('#loc1,#loc2').attr('class', "fa fa-unlock-alt").css('color','');
                                    $('#np,#cnp').css('border-bottom','2px solid #efefef');
                                    $('#cpass')[0].reset();
                                }else{
                                    pops("Somthing Wrong","error");
                                }
                            }
                        });
                    }
                }
            }
        });

        $('#ccc').click(function() {
            
        });

        function pops(msg,icon){
                //variable for function
                var string = $('#uname').text(),text = string.split(" "),name = text[1];
                var red = "#ef8989",green = "#90d473",blue = "#83c6e4";

                if(icon == "error") {
                    $('.msg').text(msg +" "+ name);
                    $('.pop i').attr('class', "fa fa-times-circle");
                    $('.ic').css("background",red);

                    $('.pop').css('display','flex').animate({
                            opacity: "1",
                        },200).delay(3000).fadeOut();
                }else if(icon == "success") {
                    $('.msg').text(msg);
                    $('.pop i').attr('class', "fa fa-check-circle");
                    $('.ic').css("background",green);

                    $('.pop').css('display','flex').animate({
                            opacity: "1",
                        },200).delay(3000).fadeOut();
                }else {
                    $('.msg').text(msg +" "+ name);
                    $('.pop i').attr('class', "fa fa-info-circle");
                    $('.ic').css("background",blue);

                    $('.pop').css('display','flex').animate({
                            opacity: "1",
                        },200).delay(3000).fadeOut();
                }
            }

    });
</script>