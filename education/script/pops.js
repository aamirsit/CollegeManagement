            //pop up notification "msg"-"icon--success--error--info--"
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
            //selected image show "file input","image id when you want to see with #"
            function readImageData(imgData,id){
                if (imgData.files && imgData.files[0]) {
                    var readerObj = new FileReader();
                    
                    readerObj.onload = function (element) {
                        $(id).attr('src', element.target.result);
                    }
                    
                    readerObj.readAsDataURL(imgData.files[0]);
                }
            }