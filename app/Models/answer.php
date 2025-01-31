<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = ['ID_RESPONDEN', 'ANSWER_QUESTION', 'FEEDBACK'];

    protected $casts = [
        'ANSWER_QUESTION' => 'array',
    ];
}
