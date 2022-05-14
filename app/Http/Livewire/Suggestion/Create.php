<?php

namespace App\Http\Livewire\Suggestion;

use Livewire\Component;
use App\Models\Wordtype;

class Create extends Component
{
    public function render()
    {
        $word_types = Wordtype::all();
        return view('livewire.suggestion.create',
            ["word_types" => $word_types]
        );
    }
}
