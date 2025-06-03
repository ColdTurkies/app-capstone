<?php

namespace App\Livewire;

use Livewire\Component;

class Workspace extends Component
{
    public $files = [];
    public $filesInWorkspace = []; // used with @entangle

    protected $listeners = ['addToWorkspace' => 'addFile'];

    public function addFile($file)
    {
        // Prevent duplicates
        if (!collect($this->files)->contains('name', $file['name'])) {
            $this->files[] = $file;
        }
    }

    public function render()
    {
        return view('livewire.workspace');
    }
}