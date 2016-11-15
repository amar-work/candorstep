/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	
	$.validator.addMethod("valueNotEquals", function(value, element, arg){
		return arg != value;
	}, "Please Choose Option");
	jQuery.validator.addMethod("lettersonlys", function(value, element) {
		return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
	}, "This contains only characters");
	$('#post_a_job_form').validate({
        rules: {
            jobTitle: {required:true,minlength:3,maxlength:50,lettersonlys:true},
			jobKeySkills: {required:true,minlength:3,maxlength:50},
			jobDesc	:{required: true,minlength:8},
			jobApplicationType:{required: true,valueNotEquals: "choose"},
			jobSalary: {required:true,minlength:2,maxlength:20},
			jobIndustry: {required: true,valueNotEquals: "choose"},
			jobFunctional:{required:true,valueNotEquals: "choose"},
			jobEducationalQlc:{required:true,minlength:2,maxlength:250},
			empCity:{required:true,valueNotEquals: "choose"},
			empState:{required:true,valueNotEquals: "choose"},
			jobContactpersoneEmail:{email:true},
			jobByEmailCC:{email:true},
			jobByEmailTo: {email:true,
				required: function(element) {
					if ($('#jobApplicationType')=='by-email') {
						return false;
					} else {
						return true;
					}
					}
				},
			jobByEmailCompanyURL: {minlength:10,url:true,
				required: function(element) {
					if ($('#jobApplicationType')=='by-comapny') {
						return false;
					} else {
						return true;
					}
					}
			}	
			
            
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
				$('#post_a_job_form')[0].reset();	
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
	
	$('#jobApplicationType').change(function(){
		console.log($(this).val());
		if($(this).val()=='by-email'){
			$('div.by_email_choose').show();
			$('div.by_company_choose').hide();
		}else if($(this).val()=='by-comapny'){
			$('div.by_company_choose').show();
			$('div.by_email_choose').hide();
		}else{
			$('div.by_email_choose, div.by_company_choose').hide();
		}
	});
	
	/*$('#chooseState').change(function(){
		if($(this).val()!='choose'){
			$('body').showLoading();
			$.ajax({
			url: baseURL+'/signup/getcitybystate',
            type: 'POST',
            data: {stateId:$(this).val()},
            success: function(response) {
				if(response.status=='sorry'){
				$('body').hideLoading();
				$('#chooseCity').append('<option value="choose">Choose City</option>');
				}else{
				$('body').hideLoading();
                $(response.cityData).each(function(indx,val) {
					  $('#chooseCity').append($('<option>').text(val.cty_city_name).attr('value', val.cty_id).attr('zip',val.cty_zip));
				});	
                }
			},error:function(response){
				$('body').hideLoading();
				$('#chooseCity').append('<option value="choose">Choose City</option>');	
			}            
        });
		}else{
			$('#chooseCity').append('<option value="choose">Choose City</option>');
		}
	})
	
	$('#chooseCity').change(function(){
		var element = $(this).find('option:selected'); 
        $('#empZip').val(element.attr("zip"));
	});*/
	
	$('.edit-form-button').click(function(){
		if($(this).text().indexOf("View") > -1){
			$(this).text($(this).text().replace("View", "Edit"));
			$('.edit-form-element').hide('slow');
			$('.non-edit-form-element').show('slow');
		}else{			
			$(this).text($(this).text().replace("Edit", "View"));
			$('.edit-form-element').show('slow');
			$('.non-edit-form-element').hide('slow');
		}
			
	});	
});
	