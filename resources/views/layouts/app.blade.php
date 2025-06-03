<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Many Desk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">

    <nav class="bg-gray-800 text-white p-4 flex justify-between">
        <div class="flex gap-4">
            <a href="/" class="hover:underline">Home</a>
            <a href="/groups" class="hover:underline">Groups</a>
            <a href="/login" class="hover:underline">Login</a>
            <a href="/about" class="hover:underline">About</a>
        </div>
    </nav>

    
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/4">
            <livewire:user-imports />
            <livewire:group-files />
        </div>
        <div class="w-3/4">
            <livewire:workspace />
        </div>
    </div>

    @livewireScripts
    <script src="/js/workspace-handler.js"></script>
</body>
</html>
