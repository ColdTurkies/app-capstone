<div>
    <input type="file" wire:model="files" multiple>

    <button wire:click="upload" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">
        Upload Files
    </button>

    @error('files.*') <span class="error text-red-600">{{ $message }}</span> @enderror

    <div class="mt-4 flex space-x-2 overflow-x-auto">
        @foreach($uploadedFiles as $file)
            <div class="relative w-24 h-24 flex-shrink-0">
                <img src="{{ $file['preview'] }}" alt="{{ $file['name'] }}" class="w-full h-full object-cover rounded border" />
                <div class="text-xs text-center truncate">{{ $file['name'] }}</div>
            </div>
        @endforeach
    </div>
</div>