<?php include "src/templates/header.php"; ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Puestos</li>
</ol>

<button class="btn btn-primary mb-2" type="button" onclick="frmPuesto();"> NUEVO <i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblPuestos">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Estatus</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Modal -->
<div id="nuevo_puesto" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="title">Nuevo Puesto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="frmPuesto">
            <div class="form-group">
              <label for="nombre">Nombre del Puesto</label>
              <input type="hidden" id="idpuesto" name="idpuesto">
              <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombre">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="registrarPuesto(event);" id="btnAccion">Registrar</button>
        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php include "src/templates/footer.php"; ?>