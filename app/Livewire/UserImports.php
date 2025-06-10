<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        // clone the array to avoid Livewire mutation issues
        $uploads = $this->files;

        foreach ($uploads as $file) {
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $safeName = \Illuminate\Support\Str::slug($originalName) . '-' . \Illuminate\Support\Str::random(6) . '.' . $extension;

            $file->storeAs('user-imports', $safeName, 'public');
        }

        // clear Livewire input and reload saved list
        $this->files = [];
        $this->loadFiles();
    }

    public function render()
    {
        return view('livewire.user-imports');
    }
}