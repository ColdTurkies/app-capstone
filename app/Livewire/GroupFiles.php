<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithBroadcasting;

class GroupFiles extends Component
{
    use WithFileUploads;

    public $file;
    public $groupFiles = [];

    public function mount()
    {
        $this->loadFiles();
    }

    public function loadFiles()
    {
        $files = Storage::disk('public')->files('group-files');

        $this->groupFiles = collect($files)->map(function ($path) {
            return [
                'name' => basename($path),
                'preview' => asset('storage/' . $path),
            ];
        })->toArray();
    }

    public function upload()
    {
        $this->validate([
            'file' => 'required|file|max:10240',
        ]);

        $path = $this->file->store('group-files', 'public');

        $this->file = null;
        $this->loadFiles();

        $this->emitTo('group-files', 'groupFilesUpdated');
    }

    protected $listeners = ['groupFilesUpdated' => 'loadFiles'];
}