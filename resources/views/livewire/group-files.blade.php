<div class="space-y-2">
    <h2 class="font-bold">Groups</h2>

    <!-- Upload Form -->
    <form wire:submit.prevent="upload" class="flex items-center gap-2">
        <input type="file" wire:model="file" class="text-sm">
        <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded text-sm">Upload</button>
    </form>

    @error('file') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

    <!-- Preview List -->
    <div class="flex gap-2 overflow-x-auto p-1">
        @foreach($groupFiles as $file)
            <div class="transform transition hover:-translate-y-1 cursor-pointer">
                <img src="{{ $file['preview'] }}" class="w-16 h-16 object-cover rounded border" alt="file">
            </div>
        @endforeach
    </div>
</div>