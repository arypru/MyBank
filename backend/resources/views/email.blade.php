<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Recuperar Contraseña</title>

    @vite('resources/css/app.css')

</head>
<body style="background: aliceblue">
<div class="grid place-items-center h-screen">
    <div class="max-w-xl rounded-xl overflow-hidden shadow-lg bg-white h-auto">

        <div class="flex flex-column justify-center align-items-center items-center  justify-around mb-5 mt-10">
            <img class="w-36" src="../logosintexto.png" alt="MyBank">
            <div class="font-bold text-2xl text-center">Recuperar Contraseña</div>
        </div>

        <div class="px-6 py-4">
            <p class="my-5">Hola {{$nombre}} ! </p>
            <p class="text-gray-700 text-base">
                Ingresa el código que te figura a continuación en el sitio web MyBank para continuar con el proceso de cambio de contraseña
            </p>
        </div>

        <div class="px-6 pt-4 pb-10 text-center">
            <span class="inline-block bg-gray-200 rounded-full px-12 py-1 text-3xl font-semibold text-gray-700 mr-2 mb-2 tracking-widest">
              {{ $codigo }}
            </span>
        </div>
    </div>
</div>

</body>
</html>
