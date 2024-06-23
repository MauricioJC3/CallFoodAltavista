@extends('Layouts.UserLY.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Mis Órdenes</h1>
    @if($orders->isEmpty())
        <p class="bg-yellow-100 text-yellow-700 p-3 rounded">No has realizado ninguna orden.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-6 text-left">Total Productos</th>
                        <th class="py-3 px-6 text-left">Total Precio</th>
                        <th class="py-3 px-6 text-left">Estado</th>
                        <th class="py-3 px-6 text-left">Fecha</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($orders as $order)
                        <tr>
                            <td class="py-3 px-6">{{ $order->total_products }}</td>
                            <td class="py-3 px-6">${{ $order->total_price }}</td>
                            <td class="py-3 px-6">
                                @if($order->status == 'pending')
                                    <span class="bg-yellow-500 text-white py-1 px-3 rounded-full text-xs">Pendiente</span>
                                @elseif($order->status == 'completed')
                                    <span class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">Completada</span>
                                @else
                                    <span class="bg-blue-500 text-white py-1 px-3 rounded-full text-xs">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-6">{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
