<?php include "src/templates/header.php"; ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Contribuyentes</li>
</ol>

<button class="btn btn-primary mb-2" type="button" onclick="frmContribuyente();"> NUEVO <i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblContribuyentes">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>RFC</th>
            <th>TELEFONO</th>
            <th>DOMICILIO</th>
            <th>ESTATUS</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Modal -->
<div id="nuevo_contribuyente" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="title">Nuevo Provedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="frmContribuyente">
            <div class="form-group">
              <label for="nombre">Nombre del Contribuyente</label>
              <input type="hidden" id="idcontribuyente" name="idcontribuyente">
              <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombre">
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="rfc">RFC</label>
                  <input type="text" name="rfc" id="rfc"  class="form-control" placeholder="RFC">
                </div>
              </div>

              <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="telefono"  class="form-control" placeholder="Teléfono">
                    </div>
              </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="domicilio">Domicilio</label>
                        <textarea name="domicilio" id="domicilio"  class="form-control" placeholder="Domicilio" rows="3"></textarea>
                    </div>
                </div>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="registrarCon(event);" id="btnAccion">Registrar</button>
        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php include "src/templates/footer.php"; ?>