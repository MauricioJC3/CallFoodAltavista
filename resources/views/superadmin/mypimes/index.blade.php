@extends('Layouts.SuperadminLY.app')

@section('title', 'MyPimes')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">MyPimes</h1>
    <a href="{{ route('mypimes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Add MyPime</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                <tr>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Photo</th>
                    <th class="py-3 px-6 text-left">Address</th>
                    <th class="py-3 px-6 text-left">Phone</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Status</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($mypimes as $mypime)
                <tr>
                    <td class="py-3 px-6">{{ $mypime->name_mypime }}</td>
                    <td class="py-3 px-6">
                        <img src="{{ asset('assets/imagenes_microempresas/' . $mypime->photo) }}" alt="{{ $mypime->name_mypime }}" class="w-12 h-12 rounded-full">
                    </td>
                    <td class="py-3 px-6">{{ $mypime->address_mypime }}</td>
                    <td class="py-3 px-6">{{ $mypime->phone_mypime }}</td>
                    <td class="py-3 px-6">{{ $mypime->email_mypime }}</td>
                    <td class="py-3 px-6">{{ $mypime->status }}</td>
                    <td class="py-3 px-6">
                        <a href="{{ route('mypimes.edit', $mypime->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('mypimes.destroy', $mypime->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                        <form action="{{ route('mypimes.toggleStatus', $mypime->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-green-500 hover:underline">{{ $mypime->status == 'activo' ? 'Deactivate' : 'Activate' }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
