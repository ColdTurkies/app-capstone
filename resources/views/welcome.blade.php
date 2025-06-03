@extends('layouts.app')

@section('content')
<div class="flex flex-col h-screen">

    <!-- TOP NAVBAR -->
    <nav class="bg-gray-800 text-white p-4 flex justify-between">
        <div class="flex gap-4">
            <a href="/" class="hover:underline">Home</a>
            <a href="/groups" class="hover:underline">Groups</a>
            <a href="/login" class="hover:underline">Login</a>
            <a href="/about" class="hover:underline">About</a>
        </div>
    </nav>

    <!-- BODY -->
    <div class="flex flex-1 overflow-hidden">

        <!-- LEFT SIDEBAR -->
        <aside class="w-1/3 bg-gray-100 p-4 flex flex-col gap-6 overflow-y-auto">
            <div class="text-xl font-semibold text-gray-700">Welcome to the App</div>
            <p class="text-gray-600">
                Explore our platform by logging in or registering. Once logged in, you'll see your file workspace and groups here.
            </p>
            <a href="{{ route('login') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Log In
            </a>
        </aside>

        <!-- WORKSPACE PLACEHOLDER -->
        <main class="w-2/3 bg-gray-50 relative overflow-hidden p-4 flex items-center justify-center">
            <div class="text-center text-gray-500">
                <h2 class="text-2xl font-semibold mb-2">Your Workspace</h2>
                <p class="mb-4">This area will display your files and allow drag & drop once you're logged in.</p>
                <img src="{{ asset('images/workspace-placeholder.svg') }}" alt="Workspace Illustration" class="w-64 mx-auto opacity-70">
            </div>
        </main>

    </div>
</div>
@endsection
