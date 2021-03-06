<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use saeedkarimmi\cms\Traits\PersianDateTrait;
use Spatie\Permission\Traits\HasRoles;
/**
 * @property integer id
 * @property integer active
 * */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, HasTeams, Notifiable, HasRoles, TwoFactorAuthenticatable,PersianDateTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name','active', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getRoleIds()
    {
        return $this->roles()->pluck('id')->toArray();
    }

    public function isActive()
    {
        return $this->active;
    }
}
