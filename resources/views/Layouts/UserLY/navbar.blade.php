<nav class="bg-gray-100 shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a class="text-lg font-bold text-gray-800" href="{{ route('user.home') }}">Your App Name</a>

            <button class="text-gray-500 focus:outline-none lg:hidden">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <div class="hidden lg:flex lg:flex-grow lg:items-center lg:w-auto" id="navbarNav">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li class="nav-item">
                        <a class="nav-link py-2 px-4 text-gray-700 hover:text-gray-900" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2 px-4 text-gray-700 hover:text-gray-900" href="{{ route('cart.index') }}">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2 px-4 text-gray-700 hover:text-gray-900" href="{{ route('orders.index') }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="nav-link">
                            @csrf
                            <button type="submit" class="py-2 px-4 text-gray-700 hover:text-gray-900">Logout</button>
                        </form>
                    </li>
                    <!-- Puedes añadir más elementos de navegación según necesites -->
                </ul>
            </div>
        </div>
    </div>
</nav>
