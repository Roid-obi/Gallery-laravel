<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'created_by',
        'description'
    ];


    // protected $attributes =[
    //     'created_by' => 'anim'
    // ];


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

    public function tags() {
        return $this->belongsToMany(Post::class,'post_tag');
    }

}
