<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileManager extends Component
{
    use WithFileUploads;

    public $file;
    public $files = [];

    public function upload()
    {
        $this->validate([
            'file' => 'required|file|max:10240',
        ]);

        $path = $this->file->store('uploads', 'public');

        $this->files[] = [
            'name' => $this->file->getClientOriginalName(),
            'path' => $path,
            'preview' => asset('storage/' . $path),
        ];

        $this->file = null;
    }

    public function render()
    {
        return view('livewire.file-manager');
    }
}
