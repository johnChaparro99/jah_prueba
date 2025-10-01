<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de Clientes</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_usuario">
        <div class="form-group">
          <label for="nombres">Nombre cliente</label>
          <input type="text" class="form-control" id="nombres_cli" name="nombres" placeholder="Nombres cliente">
          <input type="hidden" id="id_cliente">
        </div>
        <div class="form-group">
          <label for="email">Correo electr&oacute;nico</label>
          <input type="text" class="form-control" id="email_cli" name="email" placeholder="ejemplo@ejemplo.com">
        </div>
        <div class="form-group">
          <label for="contrasena">telefono</label>
          <input type="number" class="form-control" id="telefono_cli" name="telefono" placeholder="3153809750">
        </div>
      </form>
      <button class="btn btn-primary" id="btn_guardar_cli">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_cli">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre cliente</th>
              <th scope="col">Email</th>
              <th scope="col">Telefono</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_clientes">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>