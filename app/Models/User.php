<?php

namespace App\Models;

use App\Models\Application\Medecin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'email',
        'contact',
        'role',
        'hopital_id',
        'pharmacie_id',
        'last_login_ip',
        'last_login_at',
        'confirmation_token',
        'statut_compte',
        'etat_user',
        'deleted_by',
        'updated_by',
        'created_by',
        'password',
    ];

    protected $dates = [
        'deleted_at',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

     /**
     * Get the medecin associated with the user.
     */
    public function medecin()
    {
        return $this->hasOne(Medecin::class);
    }
}
