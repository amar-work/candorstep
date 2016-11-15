/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	
	console.log("herere");
	//$("#editProfileView").hide();
	$("#toggleEditProfile").click(function(){
		$("#viewProfile").hide();
		$("#editProfileView").show();
		$('html,body').animate({scrollTop: $('div#profile').offset().top},'slow');
	});
	
	$(".toggleViewProfile").click(function(){
		$('html,body').animate({scrollTop: $('div#profile').offset().top},'slow');
		$("#viewProfile").show();
		$("#editProfileView").hide();
		
	});
	$("body").on("click", ".addUserSkill", function(){
			
			//var string=replaceAll(replaceAll($(this).parent("td").parent('tr').html(),'value=','dummy='),'selected=','dummy=');
			var htmlWithEmptyValue=replaceAll($(this).parent("td").parent('tr').html(),'selected=','dummy=').replace("value=", "dummy=");	
			
			$(this).parent("td").parent('tr').after("<tr>"+htmlWithEmptyValue+"</tr>");
			$(this).parent("td").parent('tr').next('tr').find("input[type='hidden']").val('0');
			$(this).addClass("fa-times removeUserSkill").removeClass("fa-plus addUserSkill");
	})
	
	$("body").on("click", ".removeUserSkill", function(){
		$(this).parent("td").parent('tr').remove();
	});
	
	$("body").on("click", "#userAddWrkExp", function(){
		var htmlWithEmptyValue=replaceAll($(this).parent("div").prev('div').html(),"value=", "newrecId=0 dummy=");	
		
		$(this).parent("div").prev('div').after("<div class='col-md-12 p10'>"+htmlWithEmptyValue+"</div>");
		$(this).parent("div").prev('div').find("input[newrecId='0']").not("input[type='text']").val('0');
	});
	
	$("body").on("click", "#userAddEdc", function(){
		var htmlWithEmptyValue=replaceAll($(this).parent("div").prev('div').html(),"isoldrec=", "isnewrec=");	
		//var htmlWithEmptyValue=$(this).parent("div").prev('div').html();	
		$(this).parent("div").prev('div').after("<div class='col-md-12 p10'>"+htmlWithEmptyValue+"</div>");
		$(this).parent("div").prev('div').find("input[isnewrec='true']").not("input[type='text']").val('0');
		$(this).parent("div").prev('div').find("input[type='text']").val('');
		 $(this).parent("div").prev('div').find("select").prop('selectedIndex',0);
	});
	
	function replaceAll(input, replace, replacewith) {
		return input.replace(new RegExp(replace, 'g'), replacewith);3
	}

	$("body").on("focus", ".userwrkExpFrom, .userwrkExpTo", function(){
		$(this).datepicker({ dateFormat: 'yy-mm-dd' });
	});
	
	
	$( "#userDob" ).datepicker({ dateFormat: 'yy-mm-dd' });
	
	//$( "#userDob" ).datepicker().format('yyyyMMdd');
	$("#alert_area").fadeTo(2000, 500).slideUp(500, function(){
               $("#alert_area").slideUp(500);
	});	
			
	$("span.addToProfile").click(function(){
		$("#viewProfile").hide();
		$("#editProfileView").show();
		var scrollTo=$(this).attr("id").replace("add_","edit_");
		
		$('html,body').animate({scrollTop: $('div#'+scrollTo).offset().top},'slow');
	});
	
	$.validator.addMethod("valueNotEquals", function(value, element, arg){
		return arg != value;
	}, "Please Choose Option");
	$.validator.addMethod("lettersonlys", function(value, element) {
		return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
	}, "This contains only characters");
	
	
		$('#candidateProfile').validate({
        rules: {
            userFstName: {required:true,minlength:3,maxlength:50,lettersonlys:true},
			userLstName: {required:true,minlength:3,maxlength:50,lettersonlys:true},
			userEmail	:{required: true,email:true,minlength:8,maxlength:250},
			userPhone:{required:true,digits:true,minlength:10,maxlength:20},
			userDOB:{required:true,minlength:10,maxlength:10},
			userState:{required:true,valueNotEquals: "choose"},
			userCity:{required:true,valueNotEquals: "choose"},
			userZip:{required:true,minlength:5,maxlength:10},
			userLnUrl:{url:true},
			userFbUrl:{url:true},
			userTwUrl:{url:true},
			userSlUrl:{url:true},
			userJobTitle:{required:true,minlength:5,maxlength:20},
			userJobExprYr:{required:true,valueNotEquals: "choose"},
			userJobExprMn:{required:true,valueNotEquals: "choose"},
			userJobType:{required:true,valueNotEquals: "choose"},
			userJobRelocate:{required:true,valueNotEquals: "choose"},
			userJobSecClr:{required:true,valueNotEquals: "choose"},

			
            
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
				$("#editProfileView").hide();
				$("#viewProfile").show();
				$("html, body").animate({ scrollTop: 0 }, 600);		
                $('body').hideLoading();
                $('#alert_area').prepend('<div class="alert alert-success"><strong>Success! </strong>'+response.message+'</div>');
				$('body').showLoading();
				location.reload();
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
	
	
	
});
	