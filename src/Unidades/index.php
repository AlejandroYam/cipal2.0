<?php include "src/templates/header.php"; ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Unidades de medida</li>
</ol>

<button class="btn btn-primary mb-2" type="button" onclick="frmUnidad();"> NUEVO <i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblUnidades">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>CLAVE</th>
            <th>DESCRIPCIÓN</th>
            <th>ESTATUS</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Modal -->
<div id="nuevo_unidad" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="title">Nueva unidad de medida</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="frmUnidad">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre de la unidad</label>
                        <input type="hidden" id="idunidad" name="idunidad">
                        <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombre">
                    </div>
                </div>

              <div class="col-md-6">
                    <div class="form-group">
                        <label for="clave">Clave</label>
                        <input type="text" name="clave" id="clave"  class="form-control" placeholder="Clave">
                    </div>
              </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion"  class="form-control" placeholder="Descripción" rows="3"></textarea>
                    </div>
                </div>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="registrarUni(event);" id="btnAccion">Registrar</button>
        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php include "src/templates/footer.php"; ?>