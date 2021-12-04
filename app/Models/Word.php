<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    //Define the fillable attributes
    protected $fillable = ["content","wordtype_id"];

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
