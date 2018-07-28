<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
        'name', 'email', 'tel', 'speaker', 'address', 'provider', 'client', 'city_id', 'company_id', 'created_at', 'updated_at'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
