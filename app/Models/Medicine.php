<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name', 'price', 'category_id', 'stock'];

        public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
