@extends('Layouts.UserLY.app')


@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Revisar Pedido</h1>
    <h3 class="text-xl font-semibold mb-2">Productos en el Carrito</h3>
    @if($cartItems->isEmpty())
        <p class="text-gray-700">No hay productos en el carrito.</p>
    @else
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                <tr>
                    <th class="py-3 px-6">Producto</th>
                    <th class="py-3 px-6">Precio</th>
                    <th class="py-3 px-6">Cantidad</th>
                    <th class="py-3 px-6">Total</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td class="py-3 px-6">{{ $cartItem->name_products }}</td>
                        <td class="py-3 px-6">${{ $cartItem->price_product }}</td>
                        <td class="py-3 px-6">{{ $cartItem->quantity }}</td>
                        <td class="py-3 px-6">${{ $cartItem->price_product * $cartItem->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3 class="text-xl font-semibold mt-4">Total: ${{ $cartItems->sum(fn($cartItem) => $cartItem->price_product * $cartItem->quantity) }}</h3>

        <h3 class="text-xl font-semibold mt-4">Información de Contacto y Pago</h3>
        <form action="{{ route('cart.placeOrder') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name_user" class="block text-gray-700">Nombre</label>
                <input type="text" name="name_user" class="form-input mt-1 block w-full" id="name_user" required>
            </div>
            <div class="mb-4">
                <label for="number_user" class="block text-gray-700">Teléfono</label>
                <input type="text" name="number_user" class="form-input mt-1 block w-full" id="number_user" required>
            </div>
            <div class="mb-4">
                <label for="email_user" class="block text-gray-700">Correo Electrónico</label>
                <input type="email" name="email_user" class="form-input mt-1 block w-full" id="email_user" required>
            </div>
            <div class="mb-4">
                <label for="method" class="block text-gray-700">Método de Pago</label>
                <select name="method" class="form-select mt-1 block w-full" id="method" required>
                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="address_user" class="block text-gray-700">Dirección</label>
                <input type="text" name="address_user" class="form-input mt-1 block w-full" id="address_user" required>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Finalizar Compra</button>
        </form>
    @endif
</div>
@endsection
