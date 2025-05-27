<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Capstone App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Load Alpine, deskDropHandler, etc. --}}
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-6 space-y-6">
        <h1 class="text-3xl font-bold mb-6">Welcome to the Capstone App</h1>

        {{-- 🟢 Livewire Component: UserImports --}}
        <livewire:user-imports />

        {{-- 🟣 Livewire Component: GroupFiles --}}
        <livewire:group-files />

        {{-- 🔵 Livewire Component: Workspace --}}
        <livewire:workspace />
    </div>

    @livewireScripts
</body>
</html>