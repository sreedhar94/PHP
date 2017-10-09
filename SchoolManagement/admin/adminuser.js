// admin user registration
$( '#createAdminUser' ).each(function(){
	this.reset();
});
$(".form-group").removeClass('has-error').removeClass('has-success');
$(".text-danger").remove();
$("#createAdminUser").unbind('submit').bind('submit', function() {
	$(".text-danger").remove();
	var form = $(this);
	// validation
	var aname = $("#aname").val();
	var aemail = $("#aemail").val();
	var ausername = $("#ausername").val();
	var aactivationcode = $("#aactivationcode").val();
	var apassword = $("#apassword").val();
	var acpassword = $("#acpassword").val();
	if (aname == "") {
		$("#aname").closest('.form-group').addClass('has-error');
		$("#aname").after('<p class="text-danger">The name field is required</p>');
	} else {
		$("#aname").closest('.form-group').removeClass('has-error');
		//$("#aname").closest('.form-group').addClass('has-success');
	}
	if (aemail == "") {
		$("#aemail").closest('.form-group').addClass('has-error');
		$("#aemail").after('<p class="text-danger">The email field is required</p>');
	} else {
		$("#aemail").closest('.form-group').removeClass('has-error');
		//$("#aemail").closest('.form-group').addClass('has-success');
	}
	if (ausername == "") {
		$("#ausername").closest('.form-group').addClass('has-error');
		$("#ausername").after('<p class="text-danger">The username field is required</p>');
	} else {
		$("#ausername").closest('.form-group').removeClass('has-error');
		//$("#ausername").closest('.form-group').addClass('has-success');
	}
	if (aactivationcode == "") {
		$("#aactivationcode").closest('.form-group').addClass('has-error');
		$("#aactivationcode").after('<p class="text-danger">The activation field is required</p>');
	} else {
		$("#aactivationcode").closest('.form-group').removeClass('has-error');
		//$("#aactivationcode").closest('.form-group').addClass('has-success');
	}
	if (apassword == "") {
		$("#apassword").closest('.form-group').addClass('has-error');
		$("#apassword").after('<p class="text-danger">The password field is required</p>');
	} else {
		$("#apassword").closest('.form-group').removeClass('has-error');
		//$("#apassword").closest('.form-group').addClass('has-success');
	}
	if (acpassword == "") {
		$("#acpassword").closest('.form-group').addClass('has-error');
		$("#acpassword").after('<p class="text-danger">The confirm password field is required</p>');
	} else if (apassword != acpassword) {
		$("#acpassword").closest('.form-group').addClass('has-error');
		$("#acpassword").after('<p class="text-danger">The confirm password should match with the password</p>');
	} else {
		$("#acpassword").closest('.form-group').removeClass('has-error');
		//$("#acpassword").closest('.form-group').addClass('has-success');
	}

	if (aname && aactivationcode && aemail && ausername && apassword && acpassword) {
		return true;
	}
	return false;
});

// admin user details update
$( '#updateadminuser' ).each(function(){
	this.reset();
});
$(".form-group").removeClass('has-error').removeClass('has-success');
$(".text-danger").remove();
$("#updateadminuser").unbind('submit').bind('submit', function() {
	$(".text-danger").remove();
	var form = $(this);
	// validation
	var aname = $("#aname").val();
	var aemail = $("#aemail").val();
	var ausername = $("#ausername").val();
	var acrpassword = $("#acrpassword").val();
	var anpassword = $("#anpassword").val();
	var acpassword = $("#acpassword").val();
	if (aname == "") {
		$("#aname").closest('.form-group').addClass('has-error');
		$("#aname").after('<p class="text-danger">The name field is required</p>');
	} else {
		$("#aname").closest('.form-group').removeClass('has-error');
		//$("#aname").closest('.form-group').addClass('has-success');
	}
	if (aemail == "") {
		$("#aemail").closest('.form-group').addClass('has-error');
		$("#aemail").after('<p class="text-danger">The email field is required</p>');
	} else {
		$("#aemail").closest('.form-group').removeClass('has-error');
		//$("#aemail").closest('.form-group').addClass('has-success');
	}
	if (ausername == "") {
		$("#ausername").closest('.form-group').addClass('has-error');
		$("#ausername").after('<p class="text-danger">The username field is required</p>');
	} else {
		$("#ausername").closest('.form-group').removeClass('has-error');
		//$("#ausername").closest('.form-group').addClass('has-success');
	}
	if (acrpassword == "") {
		$("#acrpassword").closest('.form-group').addClass('has-error');
		$("#acrpassword").after('<p class="text-danger">The current password field is required</p>');
	} else {
		$("#acrpassword").closest('.form-group').removeClass('has-error');
		//$("#aactivationcode").closest('.form-group').addClass('has-success');
	}
	if (anpassword != "") {
		if (acpassword == "") {
			$("#acpassword").closest('.form-group').addClass('has-error');
			$("#acpassword").after('<p class="text-danger">The confirm password field is required</p>');
		} else if (anpassword != acpassword) {
			$("#acpassword").closest('.form-group').addClass('has-error');
			$("#acpassword").after('<p class="text-danger">The confirm password should match with the new password</p>');
		} else {
			$("#acpassword").closest('.form-group').removeClass('has-error');
			//$("#acpassword").closest('.form-group').addClass('has-success');
		}
	}

	if (aname && aemail && ausername && acrpassword) {
		return true;
	}
	return false;
});

//admin user login
$( '#adminUserLogin' ).each(function(){
	this.reset();
});
$(".form-group").removeClass('has-error').removeClass('has-success');
$(".text-danger").remove();

$("#adminUserLogin").unbind('submit').bind('submit', function() {
	$(".text-danger").remove();
	var ausername = $("#ausername").val();
	var apassword = $("#apassword").val();

	if (ausername == "") {
		$("#ausername").closest('.form-group').addClass('has-error');
		$("#ausername").after('<p class="text-danger">The username field is required</p>');
	} else {
		$("#ausername").closest('.form-group').removeClass('has-error');
	//$("#ausername").closest('.form-group').addClass('has-success');
	}
	if (apassword == "") {
		$("#apassword").closest('.form-group').addClass('has-error');
		$("#apassword").after('<p class="text-danger">The password field is required</p>');
	} else {
		$("#apassword").closest('.form-group').removeClass('has-error');
	//$("#apassword").closest('.form-group').addClass('has-success');
	}
	if (ausername && apassword) {
		return true;
	}

	return false;
});