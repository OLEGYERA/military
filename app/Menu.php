<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'parent', 'type', 'name', 'alias', 'drop'
    ];

}
