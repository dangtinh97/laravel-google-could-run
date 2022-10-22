<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'status',
        'parent_id',
    ];

    protected $timestamp = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany(Posts::class, 'id');
    }
}
