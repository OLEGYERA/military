<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatgoryImage extends Model
{
    protected $fillable = [
        'type', 'path'
    ];
}
