<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Post extends Model
{
    /* > NOTE that you have NOT add `tags` column to `posts` table  */
    use HasFactory, HasTags;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'tags',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
