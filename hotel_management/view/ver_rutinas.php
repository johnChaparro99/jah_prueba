<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Rutina asignada</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_rutinas_v">
        <div class="form-group">
          
          <input type="hidden" id="cedula_usuario_rt" name="cedula_usuario_rt" value="<?php echo $_SESSION["cedula"]; ?>">
        </div>
        <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Grupo muscular</th>
              <th scope="col">Ejercicio</th>
              <th scope="col">Series</th>
              <th scope="col">Repeticiones</th>
            </tr>
          </thead>
          <tbody id="tb_ver_rutina">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>