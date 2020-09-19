<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'due' => 'required',
    ];
}
