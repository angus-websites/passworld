<?php

namespace App\Http\Livewire\Words;

use Livewire\Component;
use App\Models\Word;
use App\Models\Wordtype;

class Index extends Component
{

    public $is_create = false;
    public $edit_modal_open = false;
    public Word $editing_word;

    protected function rules()
    {
        /**
         * The validation rules
         * for all properties
         * of a education
         */
        return [
            'editing_word.content' => ["required", "string", "min:1", "unique:words,content,". $this->editing_word->id],


        ];
    }

    public function render()
    {
        return view('livewire.words.index', ["words" => Word::all(), "wordtypes" => Wordtype::all()]);
    }

    public function mount()
    {
        $this->editing_word = Word::firstOrNew();
    }

    public function edit(Word $word)
    {
        /**
         * Show the editing modal
         */
        $this->edit_modal_open = true;
        $this->editing_word = $word;
    }

    public function saveWord()
    {
        /**
         * Save the word
         */
        $this->validate();
        $this->editing_word->save();
        $this->edit_modal_open = false;
    }
}
