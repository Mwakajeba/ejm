<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forbidden</title>
    @vite(['resources/css/app.css'])
</head>
<body class="flex min-h-screen items-center justify-center bg-zinc-100 px-4">
    <div class="max-w-md rounded-2xl border border-zinc-200 bg-white p-8 text-center shadow-sm">
        <h1 class="text-xl font-semibold text-zinc-900">Access denied</h1>
        <p class="mt-2 text-sm text-zinc-600">{{ $exception->getMessage() ?: 'You do not have permission to view this page.' }}</p>
        <a href="{{ url('/') }}" class="mt-6 inline-block text-sm font-medium text-red-600 hover:text-red-700">Back to store</a>
    </div>
</body>
</html>
