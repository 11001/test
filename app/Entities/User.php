<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Auth\Authenticatable;

class User extends Model implements Transformable
{
    use TransformableTrait,  Authenticatable ;

    public $timestamps = false;

    protected $fillable = ['firstname', 'lastname', 'email'];

    public function books()
    {
        return $this->belongsToMany('App\Entities\Book');
    }
}
