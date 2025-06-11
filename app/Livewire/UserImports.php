<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UserImports extends Component
{
    use WithFileUploads;

    public $files = [];
    public $uploadedFiles = [];

    public function mount()
    {
        $this->loadFiles();
    }

    public function getUploadedFilesJsonProperty()
    {
        return json_encode($this->uploadedFiles);
    }


    public function loadFiles()
    {
        $paths = Storage::disk('public')->files('user-imports');

        $this->uploadedFiles = collect($paths)->map(function ($path) {
            return [
                'name' => basename($path),
                'preview' => asset('storage/' . $path), // public link
            ];
        })->toArray();
    }

    public function upload()
    {
        $this->validate([
            'files.*' => 'required|file|max:10240',
        ]);

        foreach ($this->files as $file) {
            // Save using original name + timestamp to avoid conflicts
            $filename = now()->format('Ymd_His_') . '_' . $file->getClientOriginalName();
            $file->storeAs('user-imports', $filename, 'public');
        }

        $this->files = [];       // Clear the input
        $this->loadFiles();      // Reload persisted files
    }

    public function render()
    {
        return view('livewire.user-imports');
    }
}