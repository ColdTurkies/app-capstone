<!-- resources/views/livewire/file-preview.blade.php -->
<div 
    x-data 
    draggable="true"
    @dragstart.window="$dispatch('drag-file', { file: @js($file) })"
    class="relative w-[100px] h-[140px] rounded shadow border overflow-hidden bg-white"
>
    <img 
        src="{{ $file['preview'] }}" 
        class="object-cover w-full h-full" 
        alt="{{ $file['name'] }}"
        onerror="this.style.display='none'"
    >
    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs text-center truncate px-1">
        {{ $file['name'] }}
    </div>
</div>