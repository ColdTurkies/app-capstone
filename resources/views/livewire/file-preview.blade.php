<div class="p-2 border rounded bg-gray-50 shadow-sm w-full max-w-[120px] text-center">
    @if($file['preview'])
        <img src="{{ $file['preview'] }}" alt="{{ $file['name'] }}" class="w-full h-24 object-cover rounded mb-2">
    @else
        <div class="w-full h-24 flex items-center justify-center bg-gray-200 text-gray-500 text-sm rounded mb-2">
            {{ strtoupper($file['extension'] ?? 'FILE') }}
        </div>
    @endif
    <div class="text-xs text-gray-700 truncate">{{ $file['name'] }}</div>
</div>