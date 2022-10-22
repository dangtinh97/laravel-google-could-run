<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $table = 'settings';

    protected $fillable = [
        'id',
        'title',
        'profile',
        'links',
        'favicon',
        'logo',
        'banner',

    ];

    protected $timestamp = true;
}
