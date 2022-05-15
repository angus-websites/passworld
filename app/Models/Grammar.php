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
        });
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

    public function phrase($seperator="_", $replacements = [])
    {
        /**
         * Generate a random phrase using the language
         * of this grammar
         * Manually substitute words into the random
         * phrase using the replacements 
         */
        
        $str = "";
        $wordtypes = $this->language()->get();
        $replacement_counter = array_map(function($wordtype_id) {return 0;}, $replacements);

        for ($x = 0; $x < count($wordtypes); $x++) {
            $wordtype=$wordtypes[$x];

            // Get the manually specified word if possible
            if (array_key_exists($wordtype->id, $replacements)){

                // Only replace first one
                if ($replacement_counter[$wordtype->id] == 0){
                    $replacement = $replacements[$wordtype->id];
                    $replacement_counter[$wordtype->id] = 1;
                }else{
                    $replacement = $wordtype->words()->inRandomOrder()->first()->content;
                }
                
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
