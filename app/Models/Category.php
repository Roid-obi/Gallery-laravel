<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'created_by',
        'description'
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $attributes = [
        'description' => ''
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'created_by'); 
    }

    // relasi category
    public function categories() {
        return $this->belongsToMany(Post::class,'post_category'); 
    }
}
