<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;
    
    protected $casts = ['profanity' => 'boolean'];
    //Define the fillable attributes
    protected $fillable = ["content","wordtype_id","profanity"];

    /**
     * Get the type of word for 
     * this suggestion
     */
    public function wordType()
    {
        return $this->belongsTo(Wordtype::class, 'wordtype_id')->firstOrFail();
    }
}
