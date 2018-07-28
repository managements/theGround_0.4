<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorize extends Model
{
    protected $fillable = ['authorize'];

    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'authorize_category', 'authorize_id', 'category_id');
    }
}
