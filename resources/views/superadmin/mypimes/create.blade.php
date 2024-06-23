@extends('Layouts.SuperadminLY.app')

@section('title', 'Add MyPime')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Add MyPime</h1>
    <form action="{{ route('mypimes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="nit_mypime" class="block text-gray-700">NIT:</label>
            <input type="text" name="nit_mypime" id="nit_mypime" class="form-input mt-1 block w-full" required>
        </div>
        <div>
            <label for="name_mypime" class="block text-gray-700">Name:</label>
            <input type="text" name="name_mypime" id="name_mypime" class="form-input mt-1 block w-full" required>
        </div>
        <div>
            <label for="photo" class="block text-gray-700">Photo:</label>
            <input type="file" name="photo" id="photo" accept="image/*" class="form-input mt-1 block w-full" required>
        </div>
        <div>
            <label for="address_mypime" class="block text-gray-700">Address:</label>
            <input type="text" name="address_mypime" id="address_mypime" class="form-input mt-1 block w-full" required>
        </div>
        <div>
            <label for="phone_mypime" class="block text-gray-700">Phone:</label>
            <input type="text" name="phone_mypime" id="phone_mypime" class="form-input mt-1 block w-full" required>
        </div>
        <div>
            <label for="email_mypime" class="block text-gray-700">Email:</label>
            <input type="email" name="email_mypime" id="email_mypime" class="form-input mt-1 block w-full" required>
        </div>
        <div>
            <label for="username" class="block text-gray-700">Username:</label>
            <input type="text" name="username" id="username" class="form-input mt-1 block w-full" required>
        </div>
        <div>
            <label for="password" class="block text-gray-700">Password:</label>
            <input type="password" name="password" id="password" class="form-input mt-1 block w-full" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add</button>
    </form>
</div>
@endsection
