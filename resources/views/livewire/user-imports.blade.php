<div>
    <!-- Newly selected files (not saved yet) -->
    <div>
    <p class="text-red-500">UserImports component loaded</p>

    <input type="file" multiple wire:model="files" />
</div>

    @if (!empty($files))
        <div class="flex flex-wrap gap-2 mt-4">
            @foreach ($files as $index => $file)
                <livewire:file-preview 
                    :file="[
                        'name' => $file->getClientOriginalName(),
                        'preview' => $file->temporaryUrl()
                    ]" 
                    :wire:key="'temp-' . $index" 
                />
            @endforeach
        </div>
    @endif

    <!-- Files already uploaded and stored -->
    @if (!empty($uploadedFiles))
        <div class="flex flex-wrap gap-2 mt-4">
            @foreach ($uploadedFiles as $index => $file)
                <livewire:file-preview 
                    :file="$file" 
                    :wire:key="'stored-' . $index" 
                />
            @endforeach
        </div>
    @endif
</div>