@extends('Layouts.UserLY.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Productos</h1>
    <form action="{{ route('products.index') }}" method="GET" class="mb-4">
        <div class="flex">
            <input type="text" name="search" class="form-input flex-grow p-2 border border-gray-300 rounded-l" placeholder="Buscar producto">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600">Buscar</button>
        </div>
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($products as $product)
            @if($product->mypime->status == 'activo')
                <div class="border rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('assets/images/' . $product->image) }}" class="w-full h-48 object-cover" alt="{{ $product->nombre_product }}">
                    <div class="p-4">
                        <h5 class="text-xl font-semibold">{{ $product->nombre_product }}</h5>
                        <p class="text-gray-700 mt-2">{{ $product->description }}</p>
                    </div>
                    <div class="p-4 bg-gray-100 flex justify-between items-center">
                        <p class="text-lg font-bold">${{ $product->price_product }}</p>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
