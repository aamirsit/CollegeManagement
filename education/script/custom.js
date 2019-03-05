$(document).ready(function() {
		$('#enr').focus(function() {
			$('.msg').css("display","none");
		});
		
		$('#next1').click(function() {

			var val = $('#enr').val();
			if(val!='Enrollment ID'){

				if(val.length === 15){
					// checking enrollment id exist or not and go to second step
					$.ajax({

						url:'ajax/check.php',
						type: "POST",
						data: {enrollment: val,},
						success: function(data) {

							if(data==1){
								$('#s1').css("display","none");
								$('#s2').css("display","");
								$('#s3').css("display","none");

								$.ajax({

									url:'ajax/fetch.php',
									type: "POST",
									data: {enroll: val,},
									success: function(data) {

										var info = data.split(":");
										$('#h').val(info[8])
										$('#roll').html("<strong>Roll no : </strong>" + info[0]);
										$('#sinfo').html(info[1] + " " + info[2] + '<small style="margin-left: 40%;"> Step 2</small>');
										$('#ady').html("<strong>Admission Year : </strong>" + info[5]);
										$('#enfor')[0].reset();
									}
								});

							}else{

								$('.msg').css("display","block");
								$('.msg').html("Enrollment ID not exist or Already Registered");	

							}
						}
					});
				}else{
					$('.msg').css("display","block");
					$('.msg').html("Enrollment Id must be of 15 character");
				}
			}else{
				$('.msg').css("display","block");
				$('.msg').html("Insert Enrollment Id");	
			}
		});

		//Update data from student data table

		$('#login').click(function() {
			$('#s3').css("display","none");
		});

		$('#signin').click(function() {
			$('#s1').css("display","");
			$('#s2').css("display","none");
			$('#s3').css("display","none");
		});

		$('#back1').click(function() {
			$('#s1').css("display","");
			$('#s2').css("display","none");
			$('#s3').css("display","none");
		});

        //login check using ajax
        
        $('#eid,#pass').focus(function() {
            $('.msgl').css("display","none");
        });
        
        $('#login1').click(function() {
            var eid = $('#eid').val(),
                pass = $('#pass').val();

                if(eid.length >= 8 && pass.length >= 8) {
                    
                    $.ajax({
                        url: "ajax/log_in.php",
                        type: "POST",
                        data: {eid: eid, pass: pass},
                        success: function(data) {
                            if(data==1) {
                                window.location.reload();
                            }else{

                                if(data==2){
                                    $('.msgl').css("display","block");
                                    $('.msgl').css("color","red");
                                    $('.msgl').html("Registration Not Approved");
                                }else{
                                    $('.msgl').css("display","block");
                                    $('.msgl').css("color","red");
                                    $('.msgl').html("Invalid Email ID or Password"); 
                                }  
                            }
                            
                        }
                    });

                }else{

                    $('.msgl').css("display","block");
                    $('.msgl').css("color","red");
                    $('.msgl').html("Enter Valid data");
                    
                }
        });
});