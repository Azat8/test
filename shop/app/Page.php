<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['image','name','text','alias'];

    protected $table = 'pages';
}
