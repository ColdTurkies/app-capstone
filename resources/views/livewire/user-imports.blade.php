<!-- File input -->
<input type="file" multiple wire:model="files" />

<!-- Save files to public storage -->
<button wire:click="upload" type="button" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded">
    Save Files
</button>

<!-- Previews before saving -->
@if ($files)
    <h3 class="mt-4 font-bold">Selected (Not Saved):</h3>
    <div class="flex flex-wrap gap-2">
        @foreach ($files as $index => $file)
            <livewire:file-preview 
                :file="[
                    'name' => $file->getClientOriginalName(),
                    'preview' => $file->temporaryUrl()
                ]" 
                :wire:key="'preview-' . $index"
            />
        @endforeach
    </div>
@endif

<!-- Previously uploaded files -->
@if (!empty($uploadedFiles))
    <h3 class="mt-6 font-bold">Uploaded Files:</h3>
    <div class="flex flex-wrap gap-2">
        @foreach ($uploadedFiles as $index => $file)
            <livewire:file-preview 
                :file="$file" 
                :wire:key="'uploaded-' . $index"
            />
        @endforeach
    </div>
@endif