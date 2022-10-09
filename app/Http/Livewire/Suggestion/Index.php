<?php

namespace App\Http\Livewire\Suggestion;

use Livewire\Component;
use App\Models\Suggestion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;

    public function render()
    {
        return view('livewire.suggestion.index', ["suggestions" => Suggestion::all()]);
    }

    public function deleteSuggestion(Suggestion $suggestion)
    {
        /**
         * Delete a user suggestion
         */
        $this->authorize('delete', $suggestion);
        $suggestion->delete();
        session()->flash('info', 'Suggestion deleted');

        
    }
}
