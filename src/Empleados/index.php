<?php include "src/templates/header.php"; ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Empleados</li>
</ol>

<button class="btn btn-primary mb-2" type="button" onclick="frmEmpleado();"> NUEVO <i class="fas fa-plus"></i></button>

<table class="table table-dark" id="tblEmpleados">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Departamento</th>
            <th>Puesto</th>
            <th>Nombre</th>
            <th>Apellido P.</th>
            <th>Apellido M.</th>
            <th>RFC</th>
            <th>curp</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Estatus</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Modal -->
<div id="nuevo_empleado" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="title">Nuevo Empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="frmEmpleado">
            <div class="form-group">
              <label for="nombre">departamento</label>
              <select name="" id="" class="form-control">
                  <option value="">1</option>
                  <option value="">2</option>
              </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="nombre">puesto</label>
                    <input type="text" name="idpuesto" id="idpuesto"  class="form-control" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre del Empleado</label>
                        <input type="hidden" id="idempleado" name="idempleado">
                        <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombre">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="nombre">apellido p</label>
                    <input type="text" name="apellidopaterno" id="apellidopaterno"  class="form-control" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">apellido m</label>
                        <input type="text" name="apellidomaterno" id="apellidomaterno"  class="form-control" placeholder="Nombre">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="nombre">rfc</label>
                    <input type="text" name="rfc" id="rfc"  class="form-control" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">curp</label>
                        <input type="text" name="curp" id="curp"  class="form-control" placeholder="Nombre">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="nombre">correo</label>
                    <input type="text" name="correo" id="correo"  class="form-control" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">telefono</label>
                        <input type="text" name="telefono" id="telefono"  class="form-control" placeholder="Nombre">
                    </div>
                </div>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="registrarEmpleado(event);" id="btnAccion">Registrar</button>
        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php include "src/templates/footer.php"; ?>