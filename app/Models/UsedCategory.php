<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedCategory extends Model
{
    use HasFactory;

    protected $fillable = [
      'post_id', 'category_id'
    ];

    public function category_title()
    {
        return $this->hasOne(Category::class,'category_id','id');
    }
}
