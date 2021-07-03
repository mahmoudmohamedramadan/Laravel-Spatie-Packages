<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Spatie\Tags\HasTags;

class Post extends Model implements Searchable
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

    public function getSearchResult(): SearchResult
    {
        $url = route('posts.edit', $this->id);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url,
        );
    }
}
