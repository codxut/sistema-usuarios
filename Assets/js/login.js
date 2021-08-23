$('#formLogin').submit(function(e) {
	e.preventDefault();
	const txtUsername = document.querySelector('#username').value;
	const txtPass = document.querySelector('#password').value;
	const obj = {
		username: txtUsername,
		password: txtPass
	};
	const url = baseUrl + "home/log";
	$.post(url, obj, function(response) {
		const data = JSON.parse(response);
		if (data.status) {
			window.location = baseUrl + 'dashboard';
		} else {
			swal('Datos erroneos', data.msg, 'error');
		}
	});
});