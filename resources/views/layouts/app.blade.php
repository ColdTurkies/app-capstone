<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Many Desk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">

    @include('components.nav') <!-- Navigation -->
    
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
