<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>DEBEDE</title>
  </head>
  <body style="background-color: rgb(216, 146, 16)">
    @include('includes.navbar')
    <div class="row pt-5">
        <div class="col-12">
            <!-- aqui comienza -->
            <div class = "container pt-3 pb-3" style="background-color: white;">
                <h2>Métodos de pago</h2>
                <div class="container">
                <!-- Se crea la fila de transferencia de pago con su boton -->
                <div class="row">
                    <div class="col">
                    Transferencia bancaria
                    </div>
                    <div class="col">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/images/traspaso.png" width="100" height="60"> </button>
                    </div>
                </div>
                <!-- Se crea la fila de webpay con su boton -->
                <div class="row">
                <div class="col">
                    Webpay
                    </div>
                    <div class="col">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/images/webpay.png" width="180" height="60"> </button>
                    </div>
                </div>
                <!-- Se crea la fila de visa con su boton -->
                <div class="row">
                <div class="col">
                    Visa
                    </div>
                    <div class="col">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/images/visa.png" width="180" height="60"> </button>
                    </div>
                </div>
                <!-- Se crea la fila de mastercard con su boton -->
                <div class="row">
                <div class="col">
                    Mastercard
                    </div>
                    <div class="col">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/images/master.png" width="110" height="60"> </button>
                    </div>
                </div>
                <!-- Se crea la fila de paypal con su boton -->
                <div class="row">
                <div class="col">
                    Paypal
                    </div>
                    <div class="col">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/images/paypal.png" width="110" height="60"> </button>
                    </div>
                </div>
            </div>  
        </div>
    </div>
  </body>
</html>