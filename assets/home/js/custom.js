///login into user panel 
$(document).on('click','#loginBtn',function(){
	login_ajax();
});


///login ajax function

function login_ajax() {
	var self = this;
	var username = $('#username').val();
	var pass = $('#pass').val();
	var btntext = "Login";
	if (username.length == 0) {

		var desc = "Email Address required";
		$('.res').text(desc);
		$('.res').addClass('text-danger');

	} else if (pass.length == 0) {

		var desc = "Password required";
		$('.res').text(desc);
		$('.res').addClass('text-danger');

	} else {

		$('.res').text("");
		//ajax request///
		$.ajax({
			type: "POST",
			url: "/Welcome/user_login_api",
			data: new FormData($("#loginForm")[0]),
			contentType: false,
			processData: false,
			beforeSend: function () {
				$('#loginBtn').text("Please Wait..");
				$('#loginBtn').attr('disabled', 'disabled');
			},
			success: function (data) {
				$('#loginBtn').text(btntext);
				$('#loginBtn').attr('disabled', false);
				d = JSON.parse(data);
				if (d.status == 'success') {
					$('.res').removeClass('text-danger');
					$('.res').text(d.message);
					$('.res').addClass('text-success');
					location.assign('/dashboard');
				} else {
					var desc = d.message;

					$('.res').text(desc);
					$('.res').addClass('text-danger');
				}
			}
		});
		///ajax request ///



	}
}
