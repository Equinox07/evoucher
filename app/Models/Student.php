<?php

namespace App\Models;

use App\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use HasRoles, Notifiable;
    protected $table = 'students';
    protected $fillable = ['firstname','email' ,'lastname','slug','mobile', 'password' ,'location'];

    public static $guard_name = "api";



        
    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class);
    }

    public function details()
    {
        return $this->hasMany(StudentDetail::class);
    }
        
       /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
