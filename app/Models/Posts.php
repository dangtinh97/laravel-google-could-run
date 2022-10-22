<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $table = 'posts';

    protected $fillable = [
        'id',
        'cate_id',
        'title',
        'slug',
        'description',
        'content',
        'image',
        'status',
        'profiles',
        'type',
    ];

    protected $timestamp = true;

    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id');
    }


}
