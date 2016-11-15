/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	//$('body').showLoading();
	$.validator.addMethod("valueNotEquals", function(value, element, arg){
		return arg != value;
	}, "Please Choose Option");
	jQuery.validator.addMethod("lettersonlys", function(value, element) {
		return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
	}, "This contains only characters");
	$('#candidate_signup_form').validate({
        rules: {
            userFstName: {required:true,minlength:3,maxlength:50,lettersonlys:true},
			userLstName: {required:true,minlength:3,maxlength:50,lettersonlys:true},
			userEmail	:{required: true,email:true,minlength:8,maxlength:250},
			userPassword: {required:true,minlength:5,maxlength:10},
			candCnfPassword: {required: true,minlength:5,maxlength:10,equalTo: "#candPassword"},
			userMobile:{required:true,digits:true,minlength:10,maxlength:20}
            
		},messages: {
			//"className[]": {required: 'Please fill class name'}
		},
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },submitHandler: function(form) {
        $('body').showLoading();
        $.ajax({
            url: form.action,
            type: 'POST',
            data: $(form).serialize(),
            success: function(response) {
				$('#alert_area').html('');
				if(response.status=='sorry'){
				$('body').hideLoading();
				$("html, body").animate({ scrollTop: 0 }, 600);	
				$('#alert_area').prepend('<div class="alert alert-error"><strong>Sorry!</strong>'+response.message+'</div>');
				}else{
				$('#candidate_signup_form')[0].reset();	
				$("html, body").animate({ scrollTop: 0 }, 600);		
                $('body').hideLoading();
                $('#alert_area').prepend('<div class="alert alert-success"><strong>Success! </strong>'+response.message+'</div>');
                }
			$("#alert_area").fadeTo(2000, 500).slideUp(500, function(){
               $("#alert_area").slideUp(500);
			});	
            },error:function(response){
					$('#alert_area').html('');
					$('#alert_area').prepend('<div class="alert alert-error"><strong>Sorry!</strong>Please try after some time</div>');
			}            
        });
    }
    });
   // employee validate
   
   $('#employee_signup_form').validate({
        rules: {
            userFstName: {required:true,minlength:3,maxlength:50,lettersonlys:true},
			userLstName	:{required:true,minlength:3,maxlength:50,lettersonlys:true},
			userEmail:{required:true,email:true,minlength:8,maxlength:250},
			userMobile:{digits:true,minlength:10,maxlength:20,required:true},
			empWork:{digits:true,minlength:10,maxlength:20},
			empFax:{digits:true,minlength:10,maxlength:20},
			cmpName:{required:true,minlength:3,maxlength:50},
			cmpAddressOne:{required:true,minlength:10,maxlength:500},
			cmpAddressTwo:{minlength:10,maxlength:500},
			empCountry:{required:true},
			empState:{required:true,valueNotEquals: "choose"},
			empCity:{required:true,valueNotEquals: "choose"},
			empZip:{required:true},
			userPassword: {required:true,minlength:5,maxlength:10},
			empCnfPassword: {required: true,minlength:5,maxlength:10,equalTo: "#empPassword"},
			
        },messages: {
			//"className[]": {required: 'Please fill class name'}
		},
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },submitHandler: function(form) {
        $('body').showLoading();
        $.ajax({
            url: form.action,
            type: 'POST',
            data: $(form).serialize(),
            success: function(response) {
				$('#alert_area').html('');
				if(response.status=='sorry'){
				$('body').hideLoading();
				$("html, body").animate({ scrollTop: 0 }, 600);	
				$('#alert_area').prepend('<div class="alert alert-error"><strong>Sorry!</strong>'+response.message+'</div>');
				}else{
				$('#employee_signup_form')[0].reset();	
				$("html, body").animate({ scrollTop: 0 }, 600);		
                $('body').hideLoading();
                $('#alert_area').prepend('<div class="alert alert-success"><strong>Success! </strong>'+response.message+'</div>');
                }
			$("#alert_area").fadeTo(2000, 500).slideUp(500, function(){
               $("#alert_area").slideUp(500);
			});	
            },error:function(response){
					$('#alert_area').html('');
					$('#alert_area').prepend('<div class="alert alert-error"><strong>Sorry!</strong>Please try after some time</div>');
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
				if(response.status=='sorry'){
				$('body').hideLoading();
				$('#chooseCity').html('<option value="choose">Choose City</option>');
				}else{
				$('#chooseCity').html('');	
				$('#chooseCity').html('<option value="choose">Choose City</option>');	
				$('body').hideLoading();
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