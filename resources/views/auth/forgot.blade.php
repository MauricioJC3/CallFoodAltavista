<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar contraseña</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        @include('_message')

        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="text-2xl font-bold text-center mb-4">Recuperar contraseña</div>
            <form action="{{ url('forgot_post') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700"><i class="fas fa-user mr-2"></i>Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Ingrese su email" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Recuperar</button>
                </div>
                <div class="text-center">
                    <span>¿No tienes una cuenta?</span> <a href="{{ url('login') }}" class="text-blue-500 hover:underline">Iniciar sesión</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
