<?php

namespace App\Livewire;

use Livewire\Component;

class FilePreview extends Component
{
    public $file;

    public function mount($file)
    {
        $this->file = $file;
    }

    public function render()
    {
        return view('livewire.file-preview');
    }
}
