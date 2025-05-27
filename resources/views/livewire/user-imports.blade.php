<div class="p-4 border rounded bg-white shadow space-y-4">
    <h2 class="text-lg font-bold">Import Files</h2>

    {{-- Upload Form --}}
    <form wire:submit.prevent="upload" class="space-y-2">
        <input type="file" wire:model="files" multiple class="block">
        @error('files.*') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">Upload</button>
    </form>

    {{-- File Cards --}}
    @if(count($uploadedFiles))
        

    @else
        <p class="text-sm text-gray-500 italic">No files uploaded yet.</p>
    @endif
</div>