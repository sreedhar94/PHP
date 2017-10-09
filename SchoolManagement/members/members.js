// $("#createStudentDetails").reset();
$( '#createStudentDetails' ).each(function(){
	this.reset();
});
$(".form-group").removeClass('has-error').removeClass('has-success');
$(".text-danger").remove();
//empty the messages div
$(".memberUserMessages").html("");

$("#createStudentDetails").unbind('submit').bind('submit', function() {
	$(".text-danger").remove();
	var form = $(this);
	// validation
	var mfirstname = $("#mfirstname").val();
	var mlastname = $("#mlastname").val();
	var mdob = $("#mdob").val();
	var mgender = $(".mgender").val();
	//var mfgender = $("#mfgender").val();
	//var checked = false;
	var memailid = $("#memailid").val();
	var musername = $("#musername").val();
	var mpassword = $("#mpassword").val();
	var mcpassword = $("#mcpassword").val();
	var mparentname = $("#mparentname").val();
	var mparentcontact = $("#mparentcontact").val();
	var mstudentcontact = $("#mstudentcontact").val();
	var maddress = $("#maddress").val();
	if (mfirstname == "") {
		$("#mfirstname").closest('.form-group').addClass('has-error');
		$("#mfirstname").after('<p class="text-danger">The firstname field is required</p>');
	} else {
		$("#mfirstname").closest('.form-group').removeClass('has-error');
	//$("#mfirstname").closest('.form-group').addClass('has-success');
	}
	if (mlastname == "") {
		$("#mlastname").closest('.form-group').addClass('has-error');
		$("#mlastname").after('<p class="text-danger">The lastname field is required</p>');
	} else {
		$("#mlastname").closest('.form-group').removeClass('has-error');
	//$("#mlastname").closest('.form-group').addClass('has-success');
	}
	if (mdob == "") {
		$("#mdob").closest('.form-group').addClass('has-error');
		$("#mdob").after('<p class="text-danger">The date of birth field is required</p>');
	} else {
		$("#mdob").closest('.form-group').removeClass('has-error');
	//$("#mdob").closest('.form-group').addClass('has-success');
	}
	if ($('input[name=mgender]:checked').length<=0) {
	// $("input[name=mgender]").closest('.form-group').addClass('has-error');
		$("#radiobtn").after('<p class="text-danger">The gender is required</p>');
	}

	if (memailid == "") {
		$("#memailid").closest('.form-group').addClass('has-error');
		$("#memailid").after('<p class="text-danger">The emailid field is required</p>');
	} else {
		$("#memailid").closest('.form-group').removeClass('has-error');
	//$("#memailid").closest('.form-group').addClass('has-success');
	}
	if (musername == "") {
		$("#musername").closest('.form-group').addClass('has-error');
		$("#musername").after('<p class="text-danger">The username field is required</p>');
	} else {
		$("#musername").closest('.form-group').removeClass('has-error');
	//$("#musername").closest('.form-group').addClass('has-success');
	}
	if (mpassword == "") {
		$("#mpassword").closest('.form-group').addClass('has-error');
		$("#mpassword").after('<p class="text-danger">The password field is required</p>');
	} else {
		$("#mpassword").closest('.form-group').removeClass('has-error');
	//$("#mpassword").closest('.form-group').addClass('has-success');
	}
	if (mcpassword == "") {
		$("#mcpassword").closest('.form-group').addClass('has-error');
		$("#mcpassword").after('<p class="text-danger">The confirm password field is required</p>');
	} else if (mpassword != mcpassword) {
		$("#mcpassword").closest('.form-group').addClass('has-error');
		$("#mcpassword").after('<p class="text-danger">The confirm password should match with the password</p>');
	} else {
		$("#mcpassword").closest('.form-group').removeClass('has-error');
	//$("#mcpassword").closest('.form-group').addClass('has-success');
	}
	if (mparentname == "") {
		$("#mparentname").closest('.form-group').addClass('has-error');
		$("#mparentname").after('<p class="text-danger">The parent name field is required</p>');
	} else {
		$("#mparentname").closest('.form-group').removeClass('has-error');
	//$("#mparentname").closest('.form-group').addClass('has-success');
	}
	if (mparentcontact == "") {
		$("#mparentcontact").closest('.form-group').addClass('has-error');
		$("#mparentcontact").after('<p class="text-danger">The parent contact field is required</p>');
	} else {
		$("#mparentcontact").closest('.form-group').removeClass('has-error');
	//$("#mparentcontact").closest('.form-group').addClass('has-success');
	}
	if (mstudentcontact == "") {
		$("#mstudentcontact").closest('.form-group').addClass('has-error');
		$("#mstudentcontact").after('<p class="text-danger">The student contact field is required</p>');
	} else {
		$("#mstudentcontact").closest('.form-group').removeClass('has-error');
	//$("#mstudentcontact").closest('.form-group').addClass('has-success');
	}
	if (maddress == "") {
		$("#maddress").closest('.form-group').addClass('has-error');
		$("#maddress").after('<p class="text-danger">The address field is required</p>');
	} else {
		$("#maddress").closest('.form-group').removeClass('has-error');
	//$("#maddress").closest('.form-group').addClass('has-success');
	}

	if (mfirstname && mlastname && mdob && memailid && musername && mpassword && mcpassword && mparentname && mparentcontact && mstudentcontact && maddress) {
		return true;
	}
	return false;
});

//member user login
$( '#memberUserLogin' ).each(function(){
	this.reset();
});
$(".form-group").removeClass('has-error').removeClass('has-success');
$(".text-danger").remove();

$("#memberUserLogin").unbind('submit').bind('submit', function() {
	$(".text-danger").remove();
	var musername = $("#musername").val();
	var mpassword = $("#mpassword").val();

	if (musername == "") {
		$("#musername").closest('.form-group').addClass('has-error');
		$("#musername").after('<p class="text-danger">The username field is required</p>');
	} else {
		$("#musername").closest('.form-group').removeClass('has-error');
	//$("#musername").closest('.form-group').addClass('has-success');
	}
	if (mpassword == "") {
		$("#mpassword").closest('.form-group').addClass('has-error');
		$("#mpassword").after('<p class="text-danger">The password field is required</p>');
	} else {
		$("#mpassword").closest('.form-group').removeClass('has-error');
	//$("#mpassword").closest('.form-group').addClass('has-success');
	}
	if (musername && mpassword) {
		return true;
	}
	return false;
});

//file Upload
$(document).on('click', '#close-preview', function(){ 
	$('.image-preview').popover('hide');
	// Hover befor close the preview    
});

$(function() {
	// Create the close button
	var closebtn = $('<button/>', {
		type:"button",
		text: 'x',
		id: 'close-preview',
		style: 'font-size: initial;',
	});
	closebtn.attr("class","close pull-right");

	// Clear event
	$('.image-preview-clear').click(function(){
		$('.image-preview').attr("data-content","").popover('hide');
		$('.image-preview-filename').val("");
		$('.image-preview-clear').hide();
		$('.image-preview-input input:file').val("");
		$(".image-preview-input-title").text(" Browse"); 
	}); 
	// Create the preview image
	$(".image-preview-input input:file").change(function (){          
		var file = this.files[0];
		var reader = new FileReader();
		// Set preview image into the popover data-content
		reader.onload = function (e) {
			$(".image-preview-input-title").text(" Change");
			$(".image-preview-clear").show();
			$(".image-preview-filename").val(file.name);
		}        
		reader.readAsDataURL(file);
	});  
});

// picture preview
$("#mprofilepicture").on('change', function () {
	if (typeof (FileReader) != "undefined") {
		var image_holder = $("#profile-picture-preview");
		image_holder.empty();
		var reader = new FileReader();
		reader.onload = function (e) {
			$("<img />", {
				"src": e.target.result,
				"class": "thumb-image"
			}).appendTo(image_holder);
		}
		image_holder.show();
		reader.readAsDataURL($(this)[0].files[0]);
	} else {
		alert("This browser does not support FileReader.");
	}
});

function javaReg() {
    $.ajax({
        type: "GET",
        url: '../core/init.php',
        data: "functionName=javaReg",
        success: function(data) {
        	if (data) {
			    $('.reg').find('.modal-body p').text(data);
			    $('.reg').modal('show');			
        	}		            
        }
    });
}
function phpReg() {
    $.ajax({
        type: "GET",
        url: '../core/init.php',
        data: "functionName=phpReg",
        success: function(data) {
        	if (data) {
			    $('.reg').find('.modal-body p').text(data);
			    $('.reg').modal('show');			
        	}		            
        }
    });
}
function angReg() {
    $.ajax({
        type: "GET",
        url: '../core/init.php',
        data: "functionName=angReg",
        success: function(data) {
        	if (data) {
			    $('.reg').find('.modal-body p').text(data);
			    $('.reg').modal('show');			
        	}		            
        }
    });
}

function check_reg() {
	$.ajax({
        type: "GET",
        url: '../core/init.php',
        data: "functionName=check_reg",
        success: function(response) {

        }
    });
}

$('#close_register').on('hidden.bs.modal', function () {
	location.reload();
});