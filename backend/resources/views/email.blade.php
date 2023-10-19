<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Recuperar Contraseña</title>
    <style>
        {!! $css !!}

        .place-items-center{
            display:grid;
            place-items: center;
        }
        .h-screen{
            height: 100vh;
        }

        .rounded-xl{
            border-radius: 0.75rem; /* 12px */
        }

        .shadow-lg{
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }
        .bg-white{
            background-color: rgb(255 255 255);
        }
        .h-auto{
            height: auto;
        }

        .flex{
            display:flex;
            flex-direction: row;
            align-content: center;
            align-items: center;
            justify-content: center;
        }

        .text-2xl{
            font-size: 1.5rem; /* 24px */
            line-height: 2rem; /* 32px */
        }
        .text-gray-700{
            color: rgb(55 65 81);
        }
        .bg-gray-200{
            background-color: rgb(229 231 235);
        }
        .rounded-full{
            border-radius: 9999px;
        }

        .font-semibold{
            font-weight: 600;
        }
        .text-base{	font-size: 1rem; /* 16px */
            line-height: 1.5rem; /* 24px */}

        .mb-5{
            margin-bottom: 1.25rem; /* 20px */
        }
        .px-6{
            padding-left: 1.5rem; /* 24px */
            padding-right: 1.5rem; /* 24px */
        }
        .px-12{
            padding-left: 3rem; /* 48px */
            padding-right: 3rem; /* 48px */
        }
        .font-bold{
            font-weight: 700;
        }
        .text-center{
            text-align: center;
        }
        .text-3xl{
            font-size: 1.875rem; /* 30px */
            line-height: 2.25rem; /* 36px */
        }

        .w-32 {
            width: 8rem;
        }

        .padding {
            padding: 12px;
        }

    </style>
    @vite('resources/css/app.css')

</head>
<body style="background: aliceblue">
<div class="grid place-items-center h-screen">
    <div class="max-w-xl rounded-xl shadow-lg bg-white h-auto padding">

        <div class="flex mb-5 mt-10">
            <img class="w-32" src="https://i.ibb.co/d6nFNFJ/logosintexto.png" alt="logosintexto" border="0">
            <div class="font-bold text-2xl text-center">Recuperar Contraseña</div>
        </div>

        <div class="px-6 py-4">
            <p class="my-5">Hola {{$nombre}} ! </p>
            <p class="text-gray-700 text-base">
                Ingresa el código que te figura a continuación en el sitio web MyBank para continuar con el proceso de cambio de contraseña
            </p>
        </div>

        <div class="px-6 pt-4 pb-10 text-center">
            <span class="bg-gray-200 rounded-full px-12 py-1 text-3xl font-semibold text-gray-700 mr-2 mb-2 tracking-widest">
              {{ $codigo }}
            </span>
        </div>
    </div>
</div>

</body>
</html>
