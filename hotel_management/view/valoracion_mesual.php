<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de valoraciones mensuales</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_valoracion_mesual">
        <div class="form-group">
          <label for="cedula_vm">Cliente</label>
          <select class="form-control" id="cedula_vm" name="cedula_vm">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="indice_masa_muscular">Indice de masa muscular</label>
          <input type="text" class="form-control" id="indice_masa_muscular" name="indice_masa_muscular">
          <input type="hidden" id="id_valoracion_mensual" name="id_valoracion_mensual" >
        </div>
        <div class="form-group">
          <label for="cuello">Cuello</label>
          <input type="text" class="form-control" id="cuello" name="cuello">
        </div>
        <div class="form-group">
          <label for="deltoides">Deltoides</label>
          <input type="text" class="form-control" id="deltoides" name="deltoides">
        </div>
        <div class="form-group">
          <label for="torax">Torax</label>
          <input type="text" class="form-control" id="torax" name="torax">
        </div>
        <div class="form-group">
          <label for="cintura">Cintura</label>
          <input type="text" class="form-control" id="cintura" name="cintura">
        </div>
        <div class="form-group">
          <label for="abdomen">Abdomen</label>
          <input type="text" class="form-control" id="abdomen" name="abdomen">
        </div>
        <div class="form-group">
          <label for="cadera">Cadera</label>
          <input type="text" class="form-control" id="cadera" name="cadera">
        </div>
        <div class="form-group">
          <label for="muslo">Muslo</label>
          <input type="text" class="form-control" id="muslo" name="muslo">
        </div>
        <div class="form-group">
          <label for="pantorrilla">Pantorrilla</label>
          <input type="text" class="form-control" id="pantorrilla" name="pantorrilla">
        </div>
        <div class="form-group">
          <label for="brazo">Brazo</label>
          <input type="text" class="form-control" id="brazo" name="brazo">
        </div>
        <div class="form-group">
          <label for="antebrazo">Antebrazo</label>
          <input type="text" class="form-control" id="antebrazo" name="antebrazo">
        </div>
        <div class="form-group">
          <label for="espalda">Espalda</label>
          <input type="text" class="form-control" id="espalda" name="espalda">
        </div>
        <div class="form-group">
          <label for="peso">Peso</label>
          <input type="text" class="form-control" id="peso" name="peso">
        </div>
        <div class="form-group">
          <label for="estatura">Estatura</label>
          <input type="text" class="form-control" id="estatura" name="estatura">
        </div>
        <div class="form-group">
          <label for="evaluacion_postural">Evaluacion postural</label>
          <input type="text" class="form-control" id="evaluacion_postural" name="evaluacion_postural">
        </div>
        <div class="form-group">
          <label for="somatotipo">somatotipo</label>
          <select class="form-control" id="somatotipo" name="somatotipo">
            <option value="">Seleccione...</option>
            <option value="Ectomorfo">Ectomorfo</option>
            <option value="Mesomorfo">Mesomorfo</option>
            <option value="Endomorfo">Endomorfo</option>
          </select>
        </div>
        <div class="form-group">
          <label for="frecuencia_cardiaca_basal">Frecuencia cardiaca basal</label>
          <input type="text" class="form-control" id="frecuencia_cardiaca_basal" name="frecuencia_cardiaca_basal">
        </div>
        <div class="form-group">
          <label for="presion_arterial">Presion arterial</label>
          <input type="text" class="form-control" id="presion_arterial" name="presion_arterial">
        </div>
        <div class="form-group">
          <label for="sistole">sistole</label>
          <input type="text" class="form-control" id="sistole" name="sistole">
        </div>
        <div class="form-group">
          <label for="subcapular">subcapular</label>
          <input type="text" class="form-control" id="subcapular" name="subcapular">
        </div>
        <div class="form-group">
          <label for="triceps">Triceps</label>
          <input type="text" class="form-control" id="triceps" name="triceps">
        </div>
        <div class="form-group">
          <label for="test_cinco_minutos">Test cinco minutos</label>
          <input type="text" class="form-control" id="test_cinco_minutos" name="test_cinco_minutos">
        </div>
        <div class="form-group">
          <label for="test_wells">Test wells</label>
          <input type="text" class="form-control" id="test_wells" name="test_wells">
        </div>
        <div class="form-group">
          <label for="test_brazos">Test brazos</label>
          <input type="text" class="form-control" id="test_brazos" name="test_brazos">
        </div>
      </form>
      <button class="btn btn-primary" id="btn_guardar_vm">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_vm">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id valoracion</th>
              <th scope="col">Nombre usuario</th>
              <th scope="col">Fecha valoracion</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_valoracion_mesual">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>