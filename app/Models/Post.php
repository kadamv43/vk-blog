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
        'short_description',
        'image',
    ];

    public function relatedByTags()
    {
        if (!$this->tags) {
            return collect(); // return empty collection if no tags
        }

        $tags = explode(',', $this->tags);

        return Post::where('id', '!=', $this->id)
            ->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhere('tags', 'LIKE', '%' . trim($tag) . '%');
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
