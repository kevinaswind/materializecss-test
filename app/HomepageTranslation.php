<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomepageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content'];
}
