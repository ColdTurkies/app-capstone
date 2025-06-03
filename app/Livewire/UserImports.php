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

    public function loadFiles()
{
    $files = Storage::disk('public')->files('user-imports');

    $this->uploadedFiles = collect($files)->map(function ($path) {
        return [
            'name' => basename($path),
            'preview' => asset('storage/' . $path),
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

        $this->files = []; // ← this resets file inputs after upload
        $this->loadFiles();
    }

    public function render()
    {
        return view('livewire.user-imports');
    }
}