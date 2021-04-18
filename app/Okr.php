<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Okr extends Model
{
    protected $fillable = [
        'category', 'subject', 'detail', "unit"
    ];
}
