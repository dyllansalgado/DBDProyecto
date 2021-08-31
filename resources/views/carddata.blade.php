<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />

        <title>Pago web</title>
        
    </head>

    <body style="background-color: rgb(216, 146, 16)">
        @include('includes.navbar')
        <div class="container bg-white text-bk">
            <a href="/payment">Volver</a>
            <h2>Pago con tarjeta</h2>
            <h1>Datos de pago<h1>
            <form>
                <div class="mb-1">
                    <label for="cardholder-name" class="form-label"><h3>Nombre</h3></label
                    >
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Bruce"
                        id="cardholder-name"
                    />
                </div>
                <div class="mb-1">
                    <label for="cardholder-surname" class="form-label"><h3>Apellido</h3></label
                    >
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Willis"
                        id="cardholder-surname"
                    />
                </div>
                <div class="mb-1">
                    <label for="cardholder-phone" class="form-label"><h3>Teléfono</h3></label
                    >
                    <input
                        type="tel"
                        class="form-control"
                        placeholder="+12 3456 7890"
                        id="cardholder-phone"
                    />
                </div>


                <h1> Datos de la tarjeta <h1>
                        <div class="mb-1">
                            <label for="cardholder-carNumber" class="form-label"><h3>Número de la tarjeta</h3></label
                            >
                            <input
                                type="tel"
                                class="form-control"
                                placeholder="1234 5678 9012 3456"
                                id="cardholder-cardNumber"
                            />
                        </div>
                        
                        <div class="mb-1">
                            <label for="cardholder-cvc" class="form-label"><h3>CVV/CVC</h3></label
                            >
                            <input
                                type="tel"
                                class="form-control"
                                placeholder="000"
                                id="cardholder-cvc"
                            />
                        </div>
                        
                        <div class="mb-1">
                            <label for="cardholder-month" class="form-label"><h3>Mes de vencimiento</h3></label
                            >
                            <input
                                type="tel"
                                class="form-control"
                                placeholder="MM"
                                id="cardholder-month"
                            />
                        </div>
                        <div class="mb-1">
                            <label for="cardholder-year" class="form-label"><h3>Año de vencimiento</h3></label
                            >
                            <input
                                type="tel"
                                class="form-control"
                                placeholder="YYYY"
                                id="cardholder-year"
                            />
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck1"
                            />
                            <label class="form-check-label" for="exampleCheck1">
                                <h6>Recordar mis datos para más tarde</h6>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-outline-primary" style="color: white;background-color: rgb(49, 150, 153);">
                            Pagar
                        </button>
                    </form>
                </div>


        </div>
    </body>
</html>
