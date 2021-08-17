<!doctype html>
<html lang="en">
  <head>
    <title>Cipalito</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/log-style.css">
  </head>
  <body>
  <div class="auth">
      <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
          <!----LOGIN--->
          
          <div class="card form-card">
              <img width="35%" src="assets/img/logo/logo_cipal.png" alt="">
            <div class="card-body">

              <form id="frmLogin">
                <div class = "form-group">
                  <label for="usuario"><i class="fas fa-user"></i>Usuario</label>
                  <input id="usuario" type="text" name="usuario" class="form-control" placeholder="Ingrese su correo electrónico">
                </div>

                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" id="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su contraseña">
                </div>
                <div class="alert alert-danger text-center d-none" id="alerta" role="altert">
                    
                </div>

                <div class="button-log">
                    <button type="submit" class="btn auth-button" onclick="frmLogin(event);">Ingresar</button>
                </div>
              </form>

            </div>
          </div>
          
        </div>

      </div>
    </div>

    <footer>
      <div class="foot">2021 © CIPAL | Desarrollado por Cfactura</div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        const base_url="<?php echo base_url; ?>";
    </script>
    <script src="assets/js/login.js"></script>
</body>
</html>