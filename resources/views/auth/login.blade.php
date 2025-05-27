<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded shadow-md w-full max-w-md">
        @csrf

        <h1 class="text-2xl font-bold mb-6 text-center">Admin Login</h1>

        @if($errors->any())
        <div class="mb-4 text-red-600 text-sm">
            {{ $errors->first() }}
        </div>
        @endif

        <div class="mb-4">
            <label for="email" class="block font-semibold">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-6">
            <label for="password" class="block font-semibold">Parolă</label>
            <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 transition font-semibold">
            Autentificare
        </button>
    </form>

</body>

</html>