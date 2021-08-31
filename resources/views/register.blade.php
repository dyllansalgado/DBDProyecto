<!doctype html<
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registro de usuario</title>
  </head>
  <body style="background-color: rgb(216, 146, 16)">
    <!-- Se incluye la barra de navegacion -->
    @include('includes.navbar')
    <div class="row pt-5">
      <div class="col-12">
        <div class="container pt-3 pb-3" style="background-color: white;">
            <div class = "register">
                <h2>Registrarse</h2>
                <!-- Datos de usuario-->
                <div class="container col-6 pt-3 pb-3">
                  Ingrese sus datos
                  <div class="form-floating pt-2">
                    <input type="text" class="form-control" id="floatingInput" placeholder="User123">
                    <label for="floatingInput">Nombre</label>
                  </div>
                  <div class="form-floating pt-2">
                    <input type="text" class="form-control" id="floatingInput" placeholder="User123">
                    <label for="floatingInput">Apellido</label>
                  </div>
                  <!-- Datos de pais-->
                  <label for="exampleDataList" class="form-label">País</label>
                  <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Buscar país...">
                  <datalist id="datalistOptions">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                  </datalist>
                  <!-- Datos de region-->
                  <label for="exampleDataList" class="form-label">Región</label>
                  <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Buscar región...">
                  <datalist id="datalistOptions">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                  </datalist>
                  <!-- Datos de comuna-->
                  <label for="exampleDataList" class="form-label">Comuna</label>
                  <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Buscar comuna...">
                  <datalist id="datalistOptions">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                  </datalist>

                  <!-- FECHA DE NACIMIENTO-->
                  <div class="col pt-3">
                    Ingrese fecha de nacimiento
                    <div class="container pt-2 pb-2">
                      <div class="row">
                        <div class="col-2">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="User123">
                            <label for="floatingInput">Día</label>
                          </div>
                        </div>
                        <div class="col pt-2 pb-2">
                          <select class="form-select form-select-lg" aria-label=".form-select-sm example">
                            <option selected>Seleccione un mes</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                          </select>
                        </div>
                        <div class="col-3">
                          <div class="form-floating pt-0 pb-0">
                            <input type="text" class="form-control" id="floatingInput" placeholder="User123">
                            <label for="floatingInput">Año</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Datos de usuario -->
                  <div class="form-floating pt-2">
                    <input type="text" class="form-control" id="floatingInput" placeholder="User123">
                    <label for="floatingInput">Nombre de usuario</label>
                  </div>
                  <div class="form-floating pt-2">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                  </div>
                  <div class="form-floating pt-2">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Contraseña</label>
                  </div>
                  <div class="form-floating pt-2">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Verifique su contraseña</label>
                  </div>
                  <div class="col-12 pt-2">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  </body>
</html>