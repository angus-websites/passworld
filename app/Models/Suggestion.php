<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    /**
     * Get the type of word for 
     * this suggestion
     */
    public function wordType()
    {
        return $this->belongsTo(Wordtype::class, 'wordtype_id')->first();
    }
}
