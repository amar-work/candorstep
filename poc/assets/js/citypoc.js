/**
 *
 *
 *
 */
	
var commonObj = {
		
    pageRedirect : function(redirectURL){
            window.location.href= redirectURL;
    },
    ajaxCall : function(data){
        $.ajax({
            url:data.url,
            data:data.data,
            type:data.type,
            success:function(response){
                window.location.href= data.redirect;
            }
        });
    },
    ajaxDeleteCall : function(data){
        $.ajax({
            url:data.url,
            data:data.data,
            type:data.type,
            success:function(response){
                window.location.href= data.redirect;
            }
        });
    },
    confirmDialog : function(data){
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
              ajaxDeleteCall(data);
            } else {
              swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    }
}

function getDepartments(){
    $.ajax({
        url: baseURL+'common/getDepartments',
        type: 'GET',
        success: function(response) {
            if(response.status=='success'){
                $('#departments').html('');
                $('#departments').append('<option value="">Select Department</option>');
                $(response.departments).each(function(indx,val) {
                          $('#departments').append($('<option>').text(val.department_name).attr('value', val.department_id));
                });	
            }else{
                $('#departments').html(' <option value="" >Choose Department</option>');	
            }
	}				
    });	
}


function getEmployees(department_id){
    $.ajax({
        url: baseURL+'common/getEmployees',
        type: 'GET',
        data: {'id':department_id},
        success: function(response) {
            if(response.status=='success'){
                $('#employees').html('');
                //$('#employees').append('<option value="">ALL</option>');
                $(response.employees).each(function(indx,val) {
                          $('#employees').append($('<option>').text(val.emp_name).attr('value', val.emp_id));
                });	
            }else{
                $('#employees').html(' <option value="" >Choose Department</option>');	
            }
	}				
    });	
}

function isDate(dateArg) {
    var t = (dateArg instanceof Date) ? dateArg : (new Date(dateArg));
    return !isNaN(t.valueOf());
}

function isValidRange(minDate, maxDate) {
    return (new Date(minDate) <= new Date(maxDate));
}

function betweenDate(startDt, endDt) {
    var error = ((isDate(endDt)) && (isDate(startDt)) && isValidRange(startDt, endDt)) ? false : true;
    var between = [];
    if (error) console.log('error occured!!!... Please Enter Valid Dates');
    else {
        var currentDate = new Date(startDt),
            end = new Date(endDt);
        while (currentDate <= end) {
            between.push(new Date(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
        }
    }
    return between;
}