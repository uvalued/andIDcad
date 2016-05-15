$(document).ready(function () {
var timeoutID = null;
    $('#registrationno').keyup(function () {

//delaytime
	if (timeoutID != null)
			clearTimeout(timeoutID);
			timeoutID = setTimeout(function() 
		{
			timeoutID = null;
			var loc = $('#registrationno').val();
			$.ajax({ //skips ajax function
            dataType: "json",
            url: "barry.php",
            data: ({
                loc: loc
            }),
            async: false,
            type: "GET",
            contentType: "application/json; charset=utf-8",
             success: function (data) {
			     $.each(data.result, function () {
                 document.getElementById('registrationno').value = data.result[0].registrationno;
					document.getElementById('fullname').value = data.result[0].fullname;
					document.getElementById('course').value = data.result[0].course;
					document.getElementById('dept').value = data.result[0].dept;
					document.getElementById('prog').value = data.result[0].prog;
					// document.getElementById('mat').value = data.result[0].registrationno;
							      });
            
			
			
			
			//this is end of success
			}
			});
		
		
		}, 3000);///paste 30000
    });
});