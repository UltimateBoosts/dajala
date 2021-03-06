<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'id','title', 'description', 'slug', 'content', 'image'
    ];
}
