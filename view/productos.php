<div id="contactenos" style="margin-top: 10%; padding-bottom: 2%;" class="recuadro">
  <div style="text-align: center;">
    <br><br>
    <h1>Administraci&oacute;n de Productos</h1>
  </div>
  <div>
    <br><br>
    <div class="container">
      <form id="form_usuario">
        <div class="form-group">
          <label for="nombre_prod">Nombre producto</label>
          <input type="text" class="form-control" id="nombre_prod" name="nombre_prod" placeholder="Nombres producto">
          <input type="hidden" id="id_producto">
        </div>
        <div class="form-group">
          <label for="precio_prod">Precio</label>
          <input type="number" class="form-control" id="precio_prod" name="precio_prod" placeholder="1500">
        </div>
        <div class="form-group">
          <label for="stock_prod">stock</label>
          <input type="number" class="form-control" id="stock_prod" name="stock_prod" placeholder="10">
        </div>
      </form>
      <button class="btn btn-primary" id="btn_guardar_prod">Guardar</button>
      <button class="btn btn-primary oculto" id="btn_editar_prod">Guardar</button>
      <div style="margin-top: 2%">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre producto</th>
              <th scope="col">Precio</th>
              <th scope="col">stock</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody id="tb_productos">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>