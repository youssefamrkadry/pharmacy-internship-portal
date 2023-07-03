<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ElapsedTime extends Component
{

    public $assigned_at;

    public function mount($assigned_at)
    {
        $this->assigned_at = $assigned_at;
    }
    public function render()
    {
        return view('livewire.elapsed-time');
    }
}
