<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de usuarios</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_usuario">
        <div class="form-group">
          <label for="nombres">Nombre usuario</label>
          <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres cliente">
          <input type="hidden" id="id_usuario">
        </div>
        <div class="form-group">
          <label for="email">Correo electr&oacute;nico</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="ejemplo@ejemplo.com">
        </div>
        <div class="form-group">
          <label for="contrasena">contraseña</label>
          <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="********">
        </div>
        <div class="form-group">
          <label for="rol">Rol</label>
          <select class="form-control" id="rol" name="rol">
            <option value="">Seleccione...</option>
            <option value="admin">Administrador</option>
            <option value="cajero">Cajero</option>
            <option value="gerente">Gerente</option>
          </select>
        </div>
      </form>
      <button class="btn btn-primary" id="btn_guardar_usu">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_usu">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombres cliente</th>
              <th scope="col">email</th>
              <th scope="col">Rol</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_usuarios">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>