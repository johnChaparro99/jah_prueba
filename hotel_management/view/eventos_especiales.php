<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de eventos especiales</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_evento_especial">
        <div class="form-group">
          <label for="nombre_evento">Nombre del evento</label>
          <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" placeholder="Nombre del evento">
          <input type="hidden" id="id_evento" name="id_evento" >
        </div>
        <div class="form-group">
          <label for="descripcion">Descripci&oacute;n</label>
          <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripci&oacute;n">
        </div>
        <div class="form-group">
          <label for="fecha_evento">Fecha de realizaci&oacute;n</label>
          <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" placeholder="Fecha de realizaci&oacute;n">
        </div>
        <div class="form-group">
          <label for="hora_inicio">Hora inicio</label>
          <select class="form-control" id="hora_inicio" name="hora_inicio">
            <option value="">Seleccione...</option>
            <option value="6:00 AM">6:00 AM</option>
            <option value="6:30 AM">6:30 AM</option>
            <option value="7:00 AM">7:00 AM</option>
            <option value="7:30 AM">7:30 AM</option>
            <option value="8:00 AM">8:00 AM</option>
            <option value="8:30 AM">8:30 AM</option>
            <option value="9:00 AM">9:00 AM</option>
            <option value="9:30 AM">9:30 AM</option>
            <option value="10:00 AM">10:00 AM</option>
            <option value="10:30 AM">10:30 AM</option>
            <option value="11:00 AM">11:00 AM</option>
            <option value="11:30 AM">11:30 AM</option>
            <option value="12:00 PM">12:00 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="1:00 PM">1:00 PM</option>
            <option value="1:30 PM">1:30 PM</option>
            <option value="2:00 PM">2:00 PM</option>
            <option value="2:30 PM">2:30 PM</option>
            <option value="3:00 PM">3:00 PM</option>
            <option value="3:30 PM">3:30 PM</option>
            <option value="4:00 PM">4:00 PM</option>
            <option value="4:30 PM">4:30 PM</option>
            <option value="5:00 PM">5:00 PM</option>
            <option value="5:30 PM">5:30 PM</option>
            <option value="6:00 PM">6:00 PM</option>
          </select>
        </div>
        <div class="form-group">
          <label for="hora_fin">Hora finalizaci&oacute;n</label>
          <select class="form-control" id="hora_fin" name="hora_fin">
            <option value="">Seleccione...</option>
            <option value="6:00 AM">6:00 AM</option>
            <option value="6:30 AM">6:30 AM</option>
            <option value="7:00 AM">7:00 AM</option>
            <option value="7:30 AM">7:30 AM</option>
            <option value="8:00 AM">8:00 AM</option>
            <option value="8:30 AM">8:30 AM</option>
            <option value="9:00 AM">9:00 AM</option>
            <option value="9:30 AM">9:30 AM</option>
            <option value="10:00 AM">10:00 AM</option>
            <option value="10:30 AM">10:30 AM</option>
            <option value="11:00 AM">11:00 AM</option>
            <option value="11:30 AM">11:30 AM</option>
            <option value="12:00 PM">12:00 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="1:00 PM">1:00 PM</option>
            <option value="1:30 PM">1:30 PM</option>
            <option value="2:00 PM">2:00 PM</option>
            <option value="2:30 PM">2:30 PM</option>
            <option value="3:00 PM">3:00 PM</option>
            <option value="3:30 PM">3:30 PM</option>
            <option value="4:00 PM">4:00 PM</option>
            <option value="4:30 PM">4:30 PM</option>
            <option value="5:00 PM">5:00 PM</option>
            <option value="5:30 PM">5:30 PM</option>
            <option value="6:00 PM">6:00 PM</option>
          </select>
        </div>
        <div class="form-group">
          <label for="cupo">Cupo</label>
          <input type="number" class="form-control" id="cupo" name="cupo">
        </div>
        <div class="form-group">
          <label for="instructor">Instructor a cargo</label>
          <select class="form-control" id="instructor" name="instructor">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="estado_esp">estado</label>
          <select class="form-control" id="estado_esp" name="estado_esp">
            <option value="">Seleccione...</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
          </select>
        </div>
      </form>
      <button class="btn btn-primary" id="btn_guardar_esp">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_esp">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Nombre del evento</th>
              <th scope="col">Fecha de realizaci&oacute;n</th>
              <th scope="col">Hora inicio</th>
              <th scope="col">Hora finalizaci&oacute;n</th>
              <th scope="col">Cupo</th>
              <th scope="col">Instructor a cargo</th>
              <th scope="col">estado</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_eventos_especiales">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>