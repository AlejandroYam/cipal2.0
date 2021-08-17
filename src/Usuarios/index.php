<?php include "src/templates/header.php"; ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Usuarios</li>
</ol>

<button class="btn btn-primary mb-2" type="button" onclick="frmUsuario();"> NUEVO <i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>estatus</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Modal -->
<div id="nuevo_usuario" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="frmUsuario">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="hidden" id="idsuario" name="idsuario">
              <input type="text" name="usuario" id="usuario"  class="form-control" placeholder="Usuario">
             
            </div>
            <div class="form-group">
              <label for="nombre">Nombre del Usuario</label>
              <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombre">
            </div>
            <div class="row" id="passwords">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password"  class="form-control" placeholder="Contraseña">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirmar">Confirmar contraseña</label>
                        <input type="password" name="confirmar" id="confirmar"  class="form-control" placeholder="Confirmar contraseña">
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="registrarUser(event);" id="btnAccion">Registrar</button>
        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php include "src/templates/footer.php"; ?>

