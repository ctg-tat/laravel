<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ArticleComments extends Model
{
    use HasFactory;

    public $fillable = [
        'text',
        'user_id',
        'article_id'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id')->first();
    }
}
