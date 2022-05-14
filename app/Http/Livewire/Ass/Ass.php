<?php

namespace App\Http\Livewire\Ass;

use Livewire\Component;
use App\Models\Grammar;

class Ass extends Component
{
    public $assword;

    public function render()
    {
        return view('livewire.ass.ass', ["assword" => $this->assword]);
    }

    public function mount()
    {
        $this->refreshAss();
    }

    public function refreshAss()
    {
        $this->assword = Grammar::randomPhrase();
    }
}
