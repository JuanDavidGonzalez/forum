<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function getUsernameAttribute(){
        return $this->user->name;
    }
}
