<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    use SoftDeletes;


    protected $fillable = [
        'name',
        'email',
        'password',
        'img',
        'active',
        'language_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id','language_id','name','email','active','img','password');

    }

    public function language()
    {
        return $this -> belongsTo('App\Models\Language','language_id','id');
    }

    public function getActive(){
        return    $this->active == 1 ? 'مفعل' : 'غير مفعل ';

    }
    public function getImgAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }

}
