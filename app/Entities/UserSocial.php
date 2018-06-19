<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserSocial extends Model
{
    use SoftDeletes;
    use Notifiable;

    public $timestamps = true;

    protected $table = 'user_socials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'social_network', 'social_id', 'social_email', 'social_avatar'
    ];
}
