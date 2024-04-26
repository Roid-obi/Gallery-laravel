<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'created_by',
        'image',
        'content',
        'slug',
        'is_pinned',
        'views',
        'status',
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $attributes = [
        'content' => '',
        'image' => '',
        'is_pinned'=> 0,
        'views'=> 0

    ];

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'created_by');
    }

    public function view()
    {
        return $this->hasMany(User::class, 'created_by');
    }

    public function comments()
    {
        return $this->hasMany(comment::class)->whereNull('parent_id');
    }

}
