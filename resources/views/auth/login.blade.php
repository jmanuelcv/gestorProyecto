<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <style>
    body {
        overflow: hidden;
        min-height: 100vh;
    }

    .boton {

        border: none;
        color: white;
        padding: 16px 40px;
        text-align: center;

        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button2 {
        background-color: white;
        color: black;
        border: 2px solid #4f6d7a;
    }

    .button2:hover {
        background-color: #4f6d7a;
        color: white;
    }



    .cascading-right {
        margin-right: -50px;
    }

    @media (max-width: 767.98px) {
        .cascading-right {
            margin-right: 0;
        }
    }
    </style>



</head>

<body>



    <!-- Section: Design Block -->
    <section class=" container text-center text-lg-start position-absolute top-50 start-50 translate-middle">


        <!-- Jumbotron -->

        <div class="row g-0 align-items-center">
            <div class="col-lg-6 col-md-6 mb-5 mb-lg-0">
                <div class="card cascading-right">
                    <div class="card-body p-5 shadow
           text-center">
                        <h2 class="fw-bold mb-5">Iniciar sesión </h2>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf





                            <div class="form-outline   form-floating mb-4">

                                <input type="email" id="email" placeholder="x"
                                    class="form-control @error('email') is-invalid @enderror border-0 border-bottom rounded-0" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus />
                                <label class="form-label x" for="email">Dirección de email</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Credenciales erroneas</strong>
                                </span>
                                @enderror


                            </div>



                            <!-- Password input -->
                            <div class=" has-float-label form-outline mb-4 form-floating">
                                <input type="password" id="password" placeholder="x"
                                    class="form-control @error('password') is-invalid @enderror border-0 border-bottom rounded-0" name="password"
                                    required autocomplete="current-password" />
                                <label class="form-label x" for="password">Contraseña</label>

                            </div>










                            <button type="submit" class="boton button2 mb-4">
                                Iniciar sesión
                            </button>


                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-5 mb-5 d-none d-md-block mb-lg-0">

                <img src="https://images.pexels.com/photos/1366909/pexels-photo-1366909.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                    class=" img-fluid rounded-4 shadow-4" alt="" />
            </div>

        </div>

        <!-- Jumbotron -->
    </section>

    <!-- Section: Design Block -->


</body>

</html>