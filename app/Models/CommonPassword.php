<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonPassword extends Model
{
    use HasFactory;

    protected $searchable = [
        'content'
    ];
}
