<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
      'title',
      'slug',
      'description',
      'thumbnail',
      'path'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function categories()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
