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

        <!-- LEFT SIDEBAR (1/3 width) -->
        <aside class="w-1/3 bg-gray-100 p-4 flex flex-col gap-6 overflow-y-auto">
            <!-- ORDER MATTERS HERE -->
            <livewire:user-imports />
            <livewire:group-files />
        </aside>

        <!-- WORKSPACE (2/3 width) -->
        <main class="w-2/3 bg-gray-50 relative overflow-hidden p-4">
            <div id="workspace"
                 class="w-full h-full border border-dashed border-gray-300 rounded-lg relative">
                <!-- Cards dropped/copied here -->
            </div>

            <!-- DELETE ZONE -->
            <div id="delete-zone"
                 class="absolute bottom-4 right-4 w-12 h-12 bg-red-500 text-white flex items-center justify-center rounded-full cursor-pointer">
                ✖
            </div>
        </main>

    </div>
</div>
@endsection