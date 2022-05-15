<?php

namespace App\Http\Livewire\Suggestion;

use Livewire\Component;
use App\Models\Wordtype;
use App\Models\Grammar;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{

    public $wordtype_id;
    public $user_word;
    public Bool $is_profanity = false;

    public $user_word_preview;
    public $user_word_preview_valid;

    public $is_submit = false;

    protected function rules()
    {
        /**
         * The validation rules
         */
        $this->user_word_two = $this->user_word;
        $rules = [
           'wordtype_id' => 'required|exists:wordtypes,id',
           'user_word' => 'unique:words,content',
           'user_word_two' => 'unique:suggestions,content',
        ];

        if ($this->is_submit)
        {
            $rules['user_word'] = 'required|unique:words,content';
            $rules['is_profanity'] = 'boolean';
        }

        return $rules;
    }

    protected $messages = [
        "wordtype_id.exists" => "Select a valid word type",
        "wordtype_id.required" => "Please choose a word type",
        "user_word.unique" => "This word is already in use",
        "user_word_two.unique" => "This word has already been suggested",
    ];

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
        $this->is_submit = false;
        $this->validate();
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

    public function submitWord()
    {
        /**
         * Called when the user
         * clicks the submit button
         */
        $this->is_submit = true;
        $this->validate();

        // Create a new suggestion
        Suggestion::create(
            [
                "content" => $this->user_word,
                "wordtype_id" => $this->wordtype_id,
                "profanity" => $this->is_profanity,
            ]
        );

        // Reset form
        $this->user_word = "";
        $this->user_word_preview_valid = false;
        
        session()->flash('success', 'Word has been submitted');

    }
}
