<?php

namespace App\Http\Livewire\Suggestion;

use Livewire\Component;
use App\Models\Suggestion;

class Index extends Component
{
    public function render()
    {
        return view('livewire.suggestion.index', ["suggestions" => Suggestion::all()]);
    }
}
