<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'image_path'
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() 
    {
        return $this->hasMany(Comments::class, 'post_id', 'id');
    }
}
