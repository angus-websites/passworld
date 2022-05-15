<?php

namespace App\Http\Livewire\Suggestion;

use Livewire\Component;
use App\Models\Wordtype;
use App\Models\Grammar;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{

    public $wordtype_id;
    public $user_word;

    public $user_word_preview;
    public $user_word_preview_valid;

    protected function rules()
    {
        /**
         * The validation rules
         */
        return [
           'wordtype_id' => 'required|exists:wordtypes,id',
           'user_word' => 'required|unique:words,content,suggestions,content'
        ];
    }

    public function render()
    {
        $word_types = Wordtype::all();
        return view('livewire.suggestion.create',
            ["word_types" => $word_types]
        );
    }

    public function mount()
    {
        $this->wordtype_id = Wordtype::firstOrNew()->id;
    }

    public function refreshPreview()
    {
        /**
         * Refresh the preview
         * of the password
         */
        
        $this->user_word_preview_valid = false;

        // Validate using custom validator

        $data= [
            "wordtype_id" => $this->wordtype_id,
            "user_word" => $this->user_word,
            "user_word_second" => $this->user_word,
        ];

        $rules = [
            'wordtype_id' => 'required|exists:wordtypes,id',
            'user_word' => 'unique:words,content',
            'user_word_second' => 'unique:suggestions,content'
        ];

        $messages = [
            'wordtype_id.required' => 'Please select a word type',
            'wordtype_id.exists' => 'Invalid word type selected somehow',
            'user_word.unique' => 'This word is already in use',
            'user_word_second.unique' => 'This word has already been suggested',
        ];

        $validator = Validator::make($data, $rules, $messages);
        $validator->validate();

        if ($this->wordtype_id && $this->user_word){

            // Generate the preview
            $grammar = Grammar::getGrammarsByWordType(Wordtype::findOrFail($this->wordtype_id))->inRandomOrder()->first();

            $this->user_word_preview = $grammar->phrase(" ", [$this->wordtype_id => $this->user_word]); 

            $this->user_word_preview_valid = true;
        }
        
    }

    public function updatedWordtypeId()
    {
        /**
         * When the user changes
         * the selected wordtype
         */
        $this->refreshPreview();
    }

    public function updatedUserWord()
    {
        /**
         * When the user updates the word
         * they type
         */
        
        $this->refreshPreview();

        

    }
}
