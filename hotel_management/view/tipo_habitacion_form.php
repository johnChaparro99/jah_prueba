<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de tipos de habitaci&oacute;n</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_tipo_habitacion">
        <div class="form-group">
          <label for="tipo">Tipo de habitaci&oacute;n</label>
          <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Estandar">
          <input type="hidden" id="id_tipo_habitacion" name="id_tipo_habitacion" >
        </div>
        <div class="form-group">
          <label for="descripcion">Descripci&oacute;n</label>
          <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Habitación estándar básica">
        </div>
      </form>
      <button class="btn btn-primary" id="btn_guardar_tipo_hab">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_tipo_hab">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id tipo habitaci&oacute;n</th>
              <th scope="col">Tipo de habitaci&oacute;n</th>
              <th scope="col">Descripci&oacute;n</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_tipo_habitacion">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>