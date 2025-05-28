<div class="space-y-6">
    <!-- Upload Form -->
    <form wire:submit.prevent="upload" class="space-y-2">
        <input type="file" wire:model="files" multiple class="text-sm">
        <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded text-sm">Upload</button>

        @error('files.*') 
            <p class="text-red-500 text-xs">{{ $message }}</p> 
        @enderror
    </form>

    <!-- Selected File Previews (before upload) -->
    @if ($files)
        <div class="flex flex-wrap gap-2">
            @foreach ($files as $file)
                <div class="w-[100px] h-[140px] rounded border overflow-hidden shadow">
                    <img src="{{ $file->temporaryUrl() }}" class="w-full h-full object-cover" alt="preview">
                </div>
            @endforeach
        </div>
    @endif

    <!-- Uploaded Files Preview (overlapping 1.4:1 cards) -->
    <div class="flex items-end space-x-[-40px]">
        @foreach ($uploadedFiles as $index => $file)
            <div 
                class="relative rounded shadow border overflow-hidden bg-white" 
                style="width: 100px; height: 140px; z-index: {{ 10 + $index }};"
            >
                <img 
                    src="{{ $file['preview'] }}" 
                    alt="{{ $file['name'] }}" 
                    class="object-cover w-full h-full"
                />
                <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs text-center truncate px-1">
                    {{ $file['name'] }}
                </div>
            </div>
        @endforeach
    </div>
</div>