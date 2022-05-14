<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Grammar extends Model
{
    use HasFactory;

    public static function randomPhrase($seperator="_"){
        return Grammar::inRandomOrder()->first()->phrase($seperator);
    }

    public static function getGrammarsByWordType(Wordtype $word_type)
    {
        /**
         * Find all the matching grammars
         * that contains the given word_type
         */
        return Grammar::whereHas('language', function (Builder $query) use($word_type) {
            $query->where('id', $word_type->id);
        })->get();
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

    public function phrase($seperator="_", $replacements = [], $replace_all = 0)
    {
        /**
         * Generate a random phrase using the language
         * of this grammar
         * Manually substitute words into the random
         * phrase using the replacements 
         */
        
        $str = "";
        $wordtypes = $this->language()->get();
        for ($x = 0; $x < count($wordtypes); $x++) {
            $wordtype=$wordtypes[$x];

            // Get the manually specified word if possible
            if (array_key_exists($wordtype->id, $replacements) ){
                $replacement = $replacements[$wordtype->id];
            }else{
                $replacement = $wordtype->words()->inRandomOrder()->first()->content;
            }
            
            $str.=$replacement;
            if ($x < count($wordtypes)-1){
                $str.=$seperator;
            }
            
        }
        return $str;
        
    }

}
