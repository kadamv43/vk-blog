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

        // SEO Fields
        'meta_title',
        'meta_description',
        'meta_keywords',
        'focus_keyword',
        'schema_type',
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

    public function getSeoTitleAttribute()
    {
        return $this->meta_title ?: $this->title;
    }

    public function getSeoDescriptionAttribute()
    {
        return $this->meta_description ?: strip_tags($this->short_description);
    }
}
