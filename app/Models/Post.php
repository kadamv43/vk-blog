<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'tags',
        'description',
        'views',
        'is_editors_pick',
        'short_description',
        'image',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function relatedByTags()
    {
        if (empty($this->tags)) {
            return collect();
        }

        return Post::where('id', '!=', $this->id)
            ->where(function ($query) {
                foreach ($this->tags as $tag) {
                    $query->orWhereJsonContains('tags', $tag);
                }
            })
            ->take(3)
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
