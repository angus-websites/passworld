<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wordtype extends Model
{
    use HasFactory;

    /**
     * Fetch words
     */
    public function words() {
        return $this->hasMany(Word::class);
    }

    /**
     * Fetch a list of grammars we
     * can use with this wordType
     */
    public function grammars(){
        return $this->belongsToMany(Grammar::class, 'grammar_wordtype');
    }

    /**
     * Will generate a phrase using a valid
     * grammar and insert this word into it
     */
    public function substitutePhrase($word){
        echo "Hello";
    }
}
