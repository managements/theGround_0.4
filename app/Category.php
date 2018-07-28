<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function Authorizes()
    {
        return $this->belongsToMany(Authorize::class, 'authorize_category', 'category_id', 'authorize_id');
    }
}
