<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de diagnosticos</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_diagnosticos">
        <div class="form-group">
          <label for="cedula_dg">Cliente</label>
          <select class="form-control" id="cedula_dg" name="cedula_dg">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="enfermedad_dermatologica">Tiene enfermedades dermatologica</label>
          <select class="form-control" id="enfermedad_dermatologica" name="enfermedad_dermatologica">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          <input type="hidden" id="id_diagnostico" name="id_diagnostico" >
        </div>
        <div class="form-group">
          <label for="diabetes">Tiene diabetes</label>
          <select class="form-control" id="diabetes" name="diabetes">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>
        <div class="form-group">
          <label for="vena_varice">Tiene vena varice</label>
          <select class="form-control" id="vena_varice" name="vena_varice">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="problemas_circulatorios">Tiene problemas circulatorios</label>
          <select class="form-control" id="problemas_circulatorios" name="problemas_circulatorios">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="hernias">Tiene hernias</label>
          <select class="form-control" id="hernias" name="hernias">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="hipertencion_arterial">Sufre hipertencion arterial</label>
          <select class="form-control" id="hipertencion_arterial" name="hipertencion_arterial">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="tiroides">Tiene problemas de tiroides</label>
          <select class="form-control" id="tiroides" name="tiroides">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="alergias">Tiene alergias</label>
          <select class="form-control" id="alergias" name="alergias">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group oculto" id="div_alergias">
          <label for="cuales_alergias">Cu&aacute;les alergias</label>
          <input type="text" class="form-control" id="cuales_alergias" name="cuales_alergias" placeholder="Cuales alergias">
        </div>
        <div class="form-group">
          <label for="toma_alcohol">Toma alcohol</label>
          <select class="form-control" id="toma_alcohol" name="toma_alcohol">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="fuma">Fuma</label>
          <select class="form-control" id="fuma" name="fuma">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="tumores">Tiene tumores</label>
          <select class="form-control" id="tumores" name="tumores">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="cancer">Sufre algun tipo de cancer</label>
          <select class="form-control" id="cancer" name="cancer">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="implantes_metalicos">Tiene algun implante metalico</label>
          <select class="form-control" id="implantes_metalicos" name="implantes_metalicos">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="marca_pasos">Tiene  marca pasos</label>
          <select class="form-control" id="marca_pasos" name="marca_pasos">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="problemas_columna">Sufre alg&uacute;n problema de columna</label>
          <select class="form-control" id="problemas_columna" name="problemas_columna">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="cirugias">Le han realizado alguna cirug&iacute;a</label>
          <select class="form-control" id="cirugias" name="cirugias">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group oculto" id="div_cirugias">
          <label for="cuales_cirugias">Cu&aacute;les cirug&iacute;as</label>
          <input type="text" class="form-control" id="cuales_cirugias" name="cuales_cirugias" placeholder="Cu&aacute;les cirug&iacute;as">
        </div>
        <div class="form-group">
          <label for="toma_medicamentos">Toma alg&uacute;n medicamento</label>
          <select class="form-control" id="toma_medicamentos" name="toma_medicamentos">
            <option value="">Seleccione...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
          
        </div>
        <div class="form-group oculto" id="div_medicamentos">
          <label for="cuales_medicamentos">Cu&aacute;les medicamentos</label>
          <input type="text" class="form-control" id="cuales_medicamentos" name="cuales_medicamentos" placeholder="Cu&aacute;les medicamentos">
        </div>
      </form>
      <button class="btn btn-primary" id="btn_guardar_dg">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_dg">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id diagnostico</th>
              <th scope="col">Nombre usuario</th>
              <th scope="col">Fecha diagnostico</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_diagnosticos">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>