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
        <span class="text-red-500">{{ $errors->first('password') }}<br></span>
        <span class="text-red-500">{{ $errors->first('confirm_password') }}<br></span>
        @include('_message')

        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="text-2xl font-bold text-center mb-4">Recuperar contraseña</div>
            <form action="{{ url('reset_post/'.$token) }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="password" class="block text-gray-700"><i class="fas fa-lock mr-2"></i>Contraseña</label>
                    <input type="password" name="password" placeholder="Ingrese su nueva contraseña" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="block text-gray-700"><i class="fas fa-lock mr-2"></i>Confirmar Contraseña</label>
                    <input type="password" name="confirm_password" placeholder="Confirme su nueva contraseña" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
