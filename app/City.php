<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps  =   false;

    protected $fillable =   [
        'city'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
}
