<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grammar extends Model
{
    use HasFactory;

    /**
     * Fetch the associated
     * word types with this grammar
     */
    public function language() {
        return $this->belongsToMany(Wordtype::class, 'grammar_wordtype');
    }

    /**
     * Convert the language into a human
     * readable format
     */
    public function displayLanguage(){
        $str = "";
        foreach($this->language()->get() as $wordtype){
            $str.=$wordtype->name;
            $str.="->";
        }
        return $str;
    }
}
