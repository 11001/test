<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Jobs\SendEmailForNotification;


class Book extends Model implements Transformable
{
    use TransformableTrait;

    public $timestamps = false;

    protected $table = 'books';

    protected $fillable = ['title', 'author', 'year', 'genre'];

    public function users()
    {
        return $this->belongsToMany('App\Entities\User');
    }


}
