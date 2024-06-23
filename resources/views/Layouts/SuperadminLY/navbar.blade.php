<nav class="bg-gray-800 py-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <a href="{{ route('superadmin.dashboard') }}" class="text-white text-lg font-bold hover:text-gray-300">Dashboard</a>
        </div>
        <div>
            <ul class="flex space-x-4">
                <li>
                    <a href="{{ route('mypimes.index') }}" class="text-white hover:text-gray-300">Administrar Pymes</a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" class="text-white hover:text-gray-300">Administrar Usuarios</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-300">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
