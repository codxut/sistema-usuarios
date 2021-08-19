<!-- Modal -->
<div class="modal fade" id="modalFormUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
            <div class="tile-body">
              <form id="formUser">
                <input type="hidden" id="idUser">
                <div class="form-group">
                  <label class="control-label">Nombres</label>
                  <input class="form-control" type="text" placeholder="Ingresa el nombre" id="nameUser" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Apellidos</label>
                  <input class="form-control" type="text" placeholder="Ingresa el apellido" id="lastnameUser" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" placeholder="Ingresa el correo electrónico" id="emailUser" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Teléfono</label>
                  <input class="form-control" type="number" placeholder="Ingresa el teléfono" id="phoneUser" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Usuario</label>
                  <input class="form-control" type="text" placeholder="Ingresa el usuario" id="usernameUser" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Contraseña</label>
                  <input class="form-control" type="password" placeholder="Ingresa la contraseña" id="passwordUser" required>
                </div>
                <div class="form-group">
                    <label for="rolSelect">Rol</label>
                    <select class="form-control" id="rolUser">
                      <option value="" disabled selected>Seleccione un rol ...</option>
                      <option value="1">Administrador</option>
                      <option value="2">Usuario</option>
                    </select>
                </div>
                <div class="tile-footer">
                  <button id="btnFormModal" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Registrar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>