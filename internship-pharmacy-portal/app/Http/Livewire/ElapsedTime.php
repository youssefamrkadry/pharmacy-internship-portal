<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ElapsedTime extends Component
{

    public $assigned_at;
    public $history = false;

    public function mount($assigned_at, $history)
    {
        $this->assigned_at = $assigned_at;
        $this->history = $history;
    }
    public function render()
    {
        return view('livewire.elapsed-time');
    }
}
