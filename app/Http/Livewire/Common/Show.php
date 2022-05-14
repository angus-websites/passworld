<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\CommonPassword;
use Livewire\WithPagination;
class Show extends Component
{
    use WithPagination;
    public $search_term = "";
    public $sort_by = "pos";
    public $sort_direction = "asc";

    public function render()
    {
        $common_passwords = CommonPassword::where('content', 'LIKE', "%{$this->search_term}%")->orderBy($this->sort_by, $this->sort_direction)->paginate(100);
        return view('livewire.common.show',
            [
                "common_passwords" => $common_passwords
            ]);
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function sortBy($field, $direction)
    {
        /**
         * Sort the results
         * on screen
         */
        $this->sort_by = $field;
    }

}
