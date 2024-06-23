@extends('Layouts.UserLY.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Carrito de Compras</h1>
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    @if($cartItems->isEmpty())
        <p class="text-gray-700">No hay productos en el carrito.</p>
    @else
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                <tr>
                    <th class="py-3 px-6">Producto</th>
                    <th class="py-3 px-6">Precio</th>
                    <th class="py-3 px-6">Cantidad</th>
                    <th class="py-3 px-6">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td class="py-3 px-6">{{ $cartItem->name_products }}</td>
                        <td class="py-3 px-6">${{ $cartItem->price_product }}</td>
                        <td class="py-3 px-6">
                            <form action="{{ route('cart.update', $cartItem) }}" method="POST" class="flex items-center">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $cartItem->quantity }}" class="form-input w-16">
                                <button type="submit" class="ml-2 bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Actualizar</button>
                            </form>
                        </td>
                        <td class="py-3 px-6">
                            <form action="{{ route('cart.destroy', $cartItem) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            <a href="{{ route('cart.checkout') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Finalizar Compra</a>
        </div>
    @endif
</div>
@endsection
