<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UserImports extends Component
{
    use WithFileUploads;

    public $files = []; // multiple files
    public $uploadedFiles = [];

    public function mount()
    {
        $this->loadFiles();
    }

    public function loadFiles()
    {
        $this->uploadedFiles = collect(Storage::disk('public')->files('user-imports'))->map(function ($path) {
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);

            return [
                'name' => basename($path),
                'preview' => $isImage ? asset('storage/' . $path) : null,
                'extension' => $ext,
            ];
        })->toArray();
    }

    public function upload()
    {
        $this->validate([
            'files.*' => 'required|file|max:10240',
        ]);

        foreach ($this->files as $file) {
            $file->store('user-imports', 'public');
        }

        $this->files = [];
        $this->loadFiles();
    }

    public function render()
    {
        return view('livewire.user-imports');
    }
}