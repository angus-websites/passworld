<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grammar extends Model
{
    use HasFactory;

    public static function randomPhrase($numberOfWords=3,$seperator="_"){
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
    public function phrase($seperator="_"){
        $str = "";
        $wordtypes = $this->language()->get();
        for ($x = 0; $x < count($wordtypes); $x++) {
            $wordtype=$wordtypes[$x];
            $str.=$wordtype->words()->inRandomOrder()->first()->content;
            if ($x < count($wordtypes)-1){
                $str.=$seperator;
            }
            
        }
        return $str;
        inRandomOrder()->get();
    }
}
