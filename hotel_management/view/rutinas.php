<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de rutinas</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_rutinas">
        <div class="form-group">
          <label for="cedula_dg">Cliente</label>
          <select class="form-control" id="cedula_rt" name="cedula_rt">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="ejercicio_rt_1">Ejercicio 1</label>
          <select class="form-control" id="ejercicio_rt_1" name="ejercicio_rt_1">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="repeticiones_1">repeticiones 1</label>
          <input type="number" class="form-control" id="repeticiones_1" name="repeticiones_1">
        </div>
        <div class="form-group">
          <label for="series_1">series 1</label>
          <input type="number" class="form-control" id="series_1" name="series_1">
        </div>
        <div class="form-group">
          <label for="ejercicio_rt_2">Ejercicio 2</label>
          <select class="form-control" id="ejercicio_rt_2" name="ejercicio_rt_2">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="repeticiones_2">repeticiones 2</label>
          <input type="number" class="form-control" id="repeticiones_2" name="repeticiones_2">
        </div>
        <div class="form-group">
          <label for="series_2">series</label>
          <input type="number" class="form-control" id="series_2" name="series_2">
        </div>
        <div class="form-group">
          <label for="ejercicio_rt_3">Ejercicio 3</label>
          <select class="form-control" id="ejercicio_rt_3" name="ejercicio_rt_3">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="repeticiones_3">repeticiones 3</label>
          <input type="number" class="form-control" id="repeticiones_3" name="repeticiones_3">
        </div>
        <div class="form-group">
          <label for="series_3">series 3</label>
          <input type="number" class="form-control" id="series_3" name="series_3">
        </div>
        <div class="form-group">
          <label for="ejercicio_rt_4">Ejercicio 4</label>
          <select class="form-control" id="ejercicio_rt_4" name="ejercicio_rt_4">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="repeticiones_4">repeticiones 4</label>
          <input type="number" class="form-control" id="repeticiones_4" name="repeticiones_4">
        </div>
        <div class="form-group">
          <label for="series_4">series 4</label>
          <input type="number" class="form-control" id="series_4" name="series_4">
        </div>
        <div class="form-group">
          <label for="ejercicio_rt_5">Ejercicio 5</label>
          <select class="form-control" id="ejercicio_rt_5" name="ejercicio_rt_5">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="repeticiones_5">repeticiones 5</label>
          <input type="number" class="form-control" id="repeticiones_5" name="repeticiones_5">
        </div>
        <div class="form-group">
          <label for="series_5">series 5</label>
          <input type="number" class="form-control" id="series_5" name="series_5">
        </div>

      </form>
      <button class="btn btn-primary" id="btn_guardar_rt">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_rt">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Numero de identificacion</th>
              <th scope="col">Nombre usuario</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_rutina">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>