<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;


    /**
    * Get the word content
    */
    public function getContentAttribute($value)
    {
        return ucfirst($value);
    }


    /**
     * Get the type of word for 
     * this suggestion
     */
    public function wordType()
    {
        return $this->belongsTo(Wordtype::class, 'wordtype_id')->firstOrFail();
    }


}
