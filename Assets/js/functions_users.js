function abrirModal()
{
	$('#modalFormUser').modal('show');
	document.querySelector('#idUser').value = '';
	document.querySelector('#title').innerHTML = 'Nuevo Usuario';
	document.querySelector('#btnFormModal').classList.replace('btn-info', 'btn-primary');
	document.querySelector('#btnText').innerHTML = 'Registrar';
	document.querySelector('#formUser').reset();
}

const formUser = document.querySelector('#formUser');
let tableUsers;

document.addEventListener('DOMContentLoaded', function() {
	tableUsers = $('#tablaUsers').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax": {
			"url": baseUrl+"Users/getUsers",
			"dataSrc": ""
		},
		"columns": [
			{"data":"name_user"},
			{"data":"lastname_user"},
			{"data":"email_user"},
			{"data":"phone_user"},
			{"data":"name_rol"},
			{"data":"accion_rol"}
		],
		"responsive": true,
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]
	});
	
	formUser.addEventListener('submit', registerUser);
});

function registerUser(e)
{
	e.preventDefault();
	const iduser = document.querySelector('#idUser').value
	const name = document.querySelector('#nameUser').value;
	const lastname = document.querySelector('#lastnameUser').value;
	const email = document.querySelector('#emailUser').value;
	const phone = document.querySelector('#phoneUser').value;
	const username = document.querySelector('#usernameUser').value;
	const password = document.querySelector('#passwordUser').value;
	const rol = document.querySelector('#rolUser').value;
	const obj = {
		iduser,
		name,
		lastname,
		email,
		phone,
		username,
		password,
		rol
	};
	const url = baseUrl + "users/insertUser";
	$.post(url, obj, function(response) {
		const data = JSON.parse(response);
		if (data.status) {
			swal('Datos registrados', data.msg, 'success');
			$('#modalFormUser').modal('hide');
			formUser.reset();
			tableUsers.api().ajax.reload(function() {
				editUser();
			});
		} else {
			swal('Error', data.msg, 'error');
		}
	})
}

function editUser()
{
	const btnEdit = document.querySelectorAll('.btnEditUser');
	btnEdit.forEach(btn => {
		btn.addEventListener('click', () => {
			document.querySelector('#title').innerHTML = 'Actualizar Usuario';
			document.querySelector('#btnFormModal').classList.replace('btn-primary', 'btn-info');
			document.querySelector('#btnText').innerHTML = 'Actualizar';

			const idUser = btn.getAttribute('rl');
			const url = baseUrl + 'users/getuser/' + idUser;
			$.get(url, function(response) {
				const data = JSON.parse(response);
				if (data.status) {
					document.querySelector('#nameUser').value = data.msg.name_user;
					document.querySelector('#lastnameUser').value = data.msg.lastname_user;
					document.querySelector('#emailUser').value = data.msg.email_user;
					document.querySelector('#phoneUser').value = data.msg.phone_user;
					document.querySelector('#usernameUser').value = data.msg.username_user;
					document.querySelector('#passwordUser').value = data.msg.password_user;
					document.querySelector('#rolUser').children[data.msg.id_rol].selected = true;
					document.querySelector('#idUser').value = data.msg.id_user;
				} else {
					swal('Error', data.msg, 'error');
				}
			});

			$('#modalFormUser').modal('show');
		});
	});
}

window.addEventListener('load', () => {
	editUser();
	deleteUser();
})

function deleteUser()
{
	const btnDelete = document.querySelectorAll('.btnDeleteUser');
	btnDelete.forEach(btn => {
		btn.addEventListener('click', () => {
			const iduser = btn.getAttribute('rl');
			swal({
				title: 'Eliminar Usuario',
				text: '¿Desea borrar el usuario?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Confirmar',
				cancelButtonText: 'Cancelar',
				closeOnConfirm: false,
				closeOnCancel:true
			}, (isConfirm) => {
				if (isConfirm) {
					const url = baseUrl + 'users/deleteUser';
					const obj = {
						iduser
					}
					$.post(url, obj, function(response) {
						const data = JSON.parse(response);
						if (data.status) {
							tableUsers.api().ajax.reload(function() {
								editUser();
								deleteUser();
							});
							swal('Eliminado', data.msg, 'success');
						} else {
							swal('Error', data.msg, 'error');
						}
					});
				}
			});
		});
	});
}