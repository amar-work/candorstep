/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	
	
	$('#forget_password_toggle').click(function(){
		$('div#loginToggle').hide('fast');
		$('div#forgetPasswrodToggle').show('slow');
	});
    
	$('#login_toggle').click(function(){
		$('div#forgetPasswrodToggle').hide('fast');
		$('div#loginToggle').show('slow');
	});
	$('.required-field').keypress(function(){
		$(this).next('span.help-block').hide();
	});
	
	$("a.toggle_search").click(function(){
		$(this).prev().toggle("slow");
	});
	
	$("form#searchJobForm").submit(function(){
		$("body").showLoading();
		//$( "#searchJobForm" ).submit();
		//return false;
	});
	
	$(".functionality").click(function(){
		var data=window.location+"&cylnders=12";
		alert(data);
	});
	
	
	$( "#userLoginForm" ).submit(function( event ) {
		var userEmail=$('#userEmail').val();
		var userPassword=$('#userPassword').val();
		var atpos = userEmail.indexOf("@");
		var dotpos = userEmail.lastIndexOf(".");
		if(userEmail==''||  userEmail==null || atpos<1 || dotpos<atpos+2 || dotpos+2>=userEmail.length){
			$('#userEmail').focus();
			$('#userEmail-error').show();
			event.preventDefault();
		}else if(userPassword==''||userPassword==null|| userPassword.length < 5){
			$('#userPassword').focus();
			$('#userPassword-error').show();
			event.preventDefault();
		}else{
		//$('.login_widget').showLoading();	
		$('body').showLoading();	
		event.preventDefault();	
		 $.ajax({
			url: baseURL+'/signup/userloginauth',
            type: 'POST',
            data: {userEmail:userEmail,userPassword:userPassword},
            success: function(response) {
				$('#userEmail').val('');
				$('#signupAlert').html('');
				if(response.status=='sorry'){
				$('body').hideLoading();
				$("html, body").animate({ scrollTop: 0 }, 600);	
				$('#signupAlert').prepend('<div class="alert alert-error"><strong>Sorry!</strong>'+response.message+'</div>');
				$('#userLoginForm')[0].reset();	
				}else{
				$('body').hideLoading();		
				$('#userLoginForm')[0].reset();	
				window.location.href = response.location;
				$('body').hideLoading();		
				/*$('#userLoginForm')[0].reset();	
				$("html, body").animate({ scrollTop: 0 }, 600);		
                $('body').hideLoading();
                $('#signupAlert').prepend('<div class="alert alert-success"><strong>Success! </strong>'+response.message+'</div>');
                */
				}
			$("#signupAlert").fadeTo(2000, 500).slideUp(500, function(){
               $("#signupAlert").slideUp(500);
			});	
            },error:function(response){
					$('body').hideLoading();	
					$('.login_widget').hideLoading();	
					$('#userLoginForm')[0].reset();	
					$('#userEmail').val('');
					$('#signupAlert').html('');
					$('#signupAlert').prepend('<div class="alert alert-error"><strong>Sorry!</strong>Please try after some time</div>');
			$("#signupAlert").fadeTo(2000, 500).slideUp(500, function(){
               $("#signupAlert").slideUp(500);
			});	
			}            
        });
		}
	});
	
	
	
	// forget password validation and call ajax method
	$( "#forgetPasswordForm" ).submit(function( event ) {
		var userEmail=$('#useForgetEmail').val();
		var atpos = userEmail.indexOf("@");
		var dotpos = userEmail.lastIndexOf(".");
		if(userEmail==''||  userEmail==null || atpos<1 || dotpos<atpos+2 || dotpos+2>=userEmail.length){
			$('#useForgetEmail').focus();
			$('#useForgetEmail-error').show();
			event.preventDefault();
		}else{
		$('body').showLoading();	
		event.preventDefault();	
		 $.ajax({
			url: baseURL+'/signup/resetpassword',
            type: 'POST',
            data: {userEmail:userEmail},
            success: function(response) {
				$('#useForgetEmail').val('');
				$('#signupAlert').html('');
				if(response.status=='sorry'){
				$('body').hideLoading();
				$("html, body").animate({ scrollTop: 0 }, 600);	
				$('#signupAlert').prepend('<div class="alert alert-error"><strong>Sorry!</strong>'+response.message+'</div>');
				}else{
				$('#forgetPasswordForm')[0].reset();	
				$("html, body").animate({ scrollTop: 0 }, 600);		
                $('body').hideLoading();
                $('#signupAlert').prepend('<div class="alert alert-success"><strong>Success! </strong>'+response.message+'</div>');
                }
			$("#signupAlert").fadeTo(2000, 500).slideUp(500, function(){
               $("#signupAlert").slideUp(500);
			});	
            },error:function(response){
					$('#useForgetEmail').val('');
					$('#signupAlert').html('');
					$('#signupAlert').prepend('<div class="alert alert-error"><strong>Sorry!</strong>Please try after some time</div>');
			}            
        });
		}
	});
	
	
	$('#chooseState').change(function(){
		if($(this).val()!='choose'){
			$('body').showLoading();
			$.ajax({
			url: baseURL+'/signup/getcitybystate',
            type: 'POST',
            data: {stateId:$(this).val()},
            success: function(response) {
				console.log(response.cityData);
				if(response.status=='sorry'){
				$('body').hideLoading();
				$('#chooseCity').html('<option value="choose">Choose City</option>');
				}else{
				$('body').hideLoading();
				$('#chooseCity').html('<option value="choose">Choose City</option>');
                $(response.cityData).each(function(indx,val) {
					  $('#chooseCity').append($('<option>').text(val.cty_city_name).attr('value', val.cty_id).attr('zip',val.cty_zip));
				});	
                }
			},error:function(response){
				$('body').hideLoading();
				$('#chooseCity').html('<option value="choose">Choose City</option>');	
			}            
        });
		}else{
			
		}
	})
	
	$('#chooseCity').change(function(){
		var element = $(this).find('option:selected'); 
        $('#empZip').val(element.attr("zip"));
	});
		
});
	