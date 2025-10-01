<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de Hoteles</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_hotel">
        <div class="form-group">
          <label for="nombre_hotel">Nombre del hotel</label>
          <input type="text" class="form-control" id="nombre_hotel" name="nombre_hotel" placeholder="Nombre del hotel">
          <input type="hidden" id="id_hotel" name="id_hotel" >
        </div>
        <div class="form-group">
          <label for="direccion_hotel">Direcci&oacute;n</label>
          <input type="text" class="form-control" id="direccion_hotel" name="direccion_hotel" placeholder="Calle 23 58-25">
        </div>
        <div class="form-group">
          <label for="ciudad">Ciudad</label>
          <input type="text" class="form-control" id="ciudad_hotel" name="ciudad" placeholder="Cartagena">
        </div>
        <div class="form-group">
          <label for="nit">Nit</label>
          <input type="text" class="form-control" id="nit" name="nit" placeholder="123456789-9">
        </div>
        <div class="form-group">
          <label for="numero_cuartos">Numero de cuartos</label>
          <input type="number" class="form-control" id="numero_cuartos" name="numero_cuartos">
        </div>
      </form>
      <button class="btn btn-primary" id="btn_guardar_hotel">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_hotel">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id hotel</th>
              <th scope="col">Nombre</th>
              <th scope="col">Direcci&oacute;n</th>
              <th scope="col">Ciudad</th>
              <th scope="col">Nit</th>
              <th scope="col">Numero de cuartos</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_hoteles">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>