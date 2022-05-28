<?php

namespace App\Http\Livewire\Words;

use Livewire\Component;
use App\Models\Word;
use App\Models\Wordtype;

class Index extends Component
{

    public $is_create = false;
    public $edit_modal_open = false;
    public $editing_word = false;

    public function render()
    {
        return view('livewire.words.index', ["words" => Word::all(), "wordtypes" => Wordtype::all()]);
    }

    public function mount()
    {
        $this->editing_word = new Word();
    }
}
