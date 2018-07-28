<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    protected $fillable =   [
        'slug', 'name', 'licence', 'brand', 'turnover',
        'email', 'tel', 'speaker', 'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id',
        'range', 'sold', 'limit', 'status_id',
        'created_at', 'updated_at'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    /**
     * @param int $id
     * @param $limit
     * @return bool
     */
    public static function activate(int $id,$limit) :bool
    {
        return self::where('id',$id)->update([
            'status_id'     => 2,
            'limit'         => $limit
        ]);
    }
}
