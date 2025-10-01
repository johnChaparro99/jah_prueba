<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Dieta asignada</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_dietas_v">
        <div class="form-group">
          
          <input type="hidden" id="cedula_usuario_dt" name="cedula_usuario_dt" value="<?php echo $_SESSION["cedula"]; ?>">
        </div>
        <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Grupo alimenticio</th>
              <th scope="col">Alimento</th>
              <th scope="col">Porcion</th>
              <th scope="col">Cantidad</th>
            </tr>
          </thead>
          <tbody id="tb_ver_dieta">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>