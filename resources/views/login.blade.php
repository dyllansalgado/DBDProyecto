<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />

        <title>Iniciar sesión</title>
    </head>
    <body style="background-color: rgb(216, 146, 16)">
        @include('includes.navbar')
        <div class="row pt-5">
            <div class="container col-4 pt-3 pb-3" style="background-color: white;">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"
                            >Usuario</label
                        >
                        <input
                            type="email"
                            class="form-control"
                            placeholder="Ingrese usuario..."
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"
                            >Contraseña</label
                        >
                        <input
                            type="password"
                            placeholder="Ingrese contraseña..."
                            class="form-control"
                            id="exampleInputPassword1"
                        />
                    </div>
                    <p>
                        <a href="#" class="card-link" style="color:rgb(49, 150, 153);">Olvide la contraseña</a>
                        <a href="/register" class="card-link" style="color: rgb(49, 150, 153);;">Registrarme</a>
                    </p>
                    <div class="mb-3 form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="exampleCheck1"
                        />
                        <label class="form-check-label" for="exampleCheck1"
                            >Recordarme</label
                        >
                    </div>
                    <button type="submit" class="btn btn-outline-primary" style="color: white;background-color: rgb(49, 150, 153);">
                        Ingresar
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
