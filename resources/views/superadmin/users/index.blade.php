@extends('layouts.SuperadminLY.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Users</h1>
    <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create User</a>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->role }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        @if($user->is_active)
                            <span class="bg-green-100 text-green-800 py-1 px-2 rounded-full text-xs">Active</span>
                        @else
                            <span class="bg-red-100 text-red-800 py-1 px-2 rounded-full text-xs">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                        <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded">
                                {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
