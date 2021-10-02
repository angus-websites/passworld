<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grammar extends Model
{
    use HasFactory;

    public static function randomPhrase(){
        return Grammar::inRandomOrder()->first()->phrase();
    }

    /**
     * Fetch the associated
     * word types with this grammar
     */
    public function language() {
        return $this->belongsToMany(Wordtype::class, 'grammar_wordtype')->orderBy('order', 'asc');
    }

    /**
     * Convert the language into a human
     * readable format
     */
    public function displayLanguage(){
        $str = "";
        foreach($this->language()->get() as $wordtype){
            $str.=$wordtype->name;
            $str.=" -> ";
        }
        return $str;
    }

    /**
     * Generate a random
     * phrase using the grammar
     * and the words in that grammar
     */
    public function phrase(){
        $str = "";
        foreach($this->language()->get() as $wordtype){
            $str.=$wordtype->words()->inRandomOrder()->first()->content;
            $str.=" ";
        }
        return $str;
        inRandomOrder()->get();
    }
}
