<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
        'age_restriction',
    ];

}
