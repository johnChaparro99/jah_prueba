<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de maquinas</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_maquina">
        <div class="form-group">
          <label for="nombre_maquina">Nombre de la m&aacute;quina</label>
          <input type="text" class="form-control" id="nombre_maquina" name="nombre_maquina" placeholder="Nombre de la m&aacute;quina">
          <input type="hidden" id="id_maquinas" name="id_maquinas" >
        </div>
        <div class="form-group">
          <label for="estado">estado</label>
          <select class="form-control" id="estado_m" name="estado_m">
            <option value="">Seleccione...</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
          </select>
        </div>
      </form>
      <button class="btn btn-primary" id="btn_guardar_maq">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_maq">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id maquina</th>
              <th scope="col">Nombre de la m&aacute;quina</th>
              <th scope="col">estado</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_maquinas">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>