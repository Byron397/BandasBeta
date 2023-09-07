<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Nombre: {{ $datosCorreo['nombre'] }}</p>
                <p>Correo Electrónico: {{ $datosCorreo['email'] }}</p>
                <p>Mensaje:</p>
                <p>{{ $datosCorreo['mensaje'] }}</p>
            </div>
        </div>
    </div>
</body>
</html>