<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de dietas</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_dietas">
        <div class="form-group">
          <label for="cedula_dg">Cliente</label>
          <select class="form-control" id="cedula_dt" name="cedula_dt">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="cedula_dg">Alimento 1</label>
          <select class="form-control" id="alimento_dt_1" name="alimento_dt_1">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nombre_maquina">Porcion 1</label>
          <input type="number" class="form-control" id="porcion_1" name="porcion_1">
        </div>
        <div class="form-group">
          <label for="nombre_maquina">Cantidad 1</label>
          <input type="number" class="form-control" id="cantidad_1" name="cantidad_1">
        </div>
        <div class="form-group">
          <label for="cedula_dg">Alimento 2</label>
          <select class="form-control" id="alimento_dt_2" name="alimento_dt_2">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nombre_maquina">Porcion 2</label>
          <input type="number" class="form-control" id="porcion_2" name="porcion_2">
        </div>
        <div class="form-group">
          <label for="nombre_maquina">Cantidad</label>
          <input type="number" class="form-control" id="cantidad_2" name="cantidad_2">
        </div>
        <div class="form-group">
          <label for="cedula_dg">Alimento 3</label>
          <select class="form-control" id="alimento_dt_3" name="alimento_dt_3">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nombre_maquina">Porcion 3</label>
          <input type="number" class="form-control" id="porcion_3" name="porcion_3">
        </div>
        <div class="form-group">
          <label for="nombre_maquina">Cantidad 3</label>
          <input type="number" class="form-control" id="cantidad_3" name="cantidad_3">
        </div>
        <div class="form-group">
          <label for="cedula_dg">Alimento 3</label>
          <select class="form-control" id="alimento_dt_4" name="alimento_dt_4">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nombre_maquina">Porcion 4</label>
          <input type="number" class="form-control" id="porcion_4" name="porcion_4">
        </div>
        <div class="form-group">
          <label for="nombre_maquina">Cantidad 4</label>
          <input type="number" class="form-control" id="cantidad_4" name="cantidad_4">
        </div>
        <div class="form-group">
          <label for="cedula_dg">Alimento 5</label>
          <select class="form-control" id="alimento_dt_5" name="alimento_dt_5">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nombre_maquina">Porcion 5</label>
          <input type="number" class="form-control" id="porcion_5" name="porcion_5">
        </div>
        <div class="form-group">
          <label for="nombre_maquina">Cantidad 5</label>
          <input type="number" class="form-control" id="cantidad_5" name="cantidad_5">
        </div>

      </form>
      <button class="btn btn-primary" id="btn_guardar_dt">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_dt">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Numero de identificacion</th>
              <th scope="col">Nombre usuario</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_dieta">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>