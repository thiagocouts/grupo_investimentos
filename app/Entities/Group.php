<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Group extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'user_id', 'instituition_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function instituition()
    {
    	return $this->belongsTo(Instituition::class);
    }
}
