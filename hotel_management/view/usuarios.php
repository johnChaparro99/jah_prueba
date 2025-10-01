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
          <label for="cedula">N&uacute;mero de documento</label>
          <input type="text" class="form-control" id="cedula" name="cedula" placeholder="cedula">
        </div>
        <div class="form-group">
          <label for="tipo_documento">Tipo de documento</label>
          <select class="form-control" id="tipo_documento" name="tipo_documento">
            <option value="">Seleccione...</option>
            <option value="Tarjeta de identidad">Tarjeta de identidad</option>
            <option value="Cedula de ciudadania">Cédula de ciudadanía</option>
            <option value="Tarjeta de extranjeria">Tarjeta de extranjería</option>
            <option value="Cedula de extranjeria">Cédula de extranjería</option>
            <option value="NIT">NIT</option>
            <option value="Pasaporte">Pasaporte</option>
            <option value="Tipo de documento extranjero">Tipo de documento extranjero</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nombres">Nombres cliente</label>
          <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres cliente">
        </div>
        <div class="form-group">
          <label for="apellidos">Apellidos cliente</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos cliente">
        </div>
        <div class="form-group">
          <label for="fecha_nacimiento">fecha de nacimiento</label>
          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha de nacimiento">
        </div>
        <div class="form-group">
          <label for="direccion">Direcci&oacute;n de residencia</label>
          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direcci&oacute;n de residencia">
        </div>
        <div class="form-group">
          <label for="telefono">N&uacute;mero de contacto</label>
          <input type="text" class="form-control" id="telefono" name="telefono" placeholder="3143809780">
        </div>
        <div class="form-group">
          <label for="email">Correo electr&oacute;nico</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="ejemplo@ejemplo.com">
        </div>
        <div class="form-group">
          <label for="genero">G&eacute;nero</label>
          <select class="form-control" id="genero" name="genero">
            <option value="">Seleccione...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
        <div class="form-group">
          <label for="contrasena">contraseña</label>
          <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="********">
        </div>
        <div class="form-group">
          <label for="estado">estado</label>
          <select class="form-control" id="estado" name="estado">
            <option value="">Seleccione...</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
          </select>
        </div>
        <div class="form-group">
          <label for="rol">Rol</label>
          <select class="form-control" id="rol" name="rol">
            <option value="">Seleccione...</option>
            <option value="Administrador">Administrador</option>
            <option value="Instructor">Instructor</option>
            <option value="Usuario">Usuario</option>
          </select>
        </div>
      </form>
      <button class="btn btn-primary" id="btn_guardar_usu">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_usu">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">N&uacute;mero de documento</th>
              <th scope="col">Tipo de documento</th>
              <th scope="col">Nombres cliente</th>
              <th scope="col">Apellidos cliente</th>
              <th scope="col">Rol</th>
              <th scope="col">estado</th>
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