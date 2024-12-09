@extends('template.header')
@section('isi')

<body class="bg-gray-100 flex items-center justify-center h-screen bg-sky-950">
    <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Sign Up</h2>
        <form action="" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Username</label>
                <input type="text" name="username" id="username"
                class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" name="password" id="password"
                class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2"
                class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit" 
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Login
            </button>
        </form>
    </div>
</body>
@endsection