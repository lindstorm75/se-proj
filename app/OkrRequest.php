<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OkrRequest extends Model
{
    protected $fillable = [
        "creator_id", "okr_id", 'amount', "is_approved", 'pdf_path'
    ];
}
