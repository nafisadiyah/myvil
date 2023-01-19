<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use Notifiable;

    // protected $table = "user";

    protected $guard = ['id'];

    // protected $primaryKey   = "userID";

    // protected $fillable = [
    //     'userID', 'nama', 'email', 'password', 'alamat', 'role'
    // ];

    // protected $hidden  = [
    //     'password'
    // ];

    public function problem()
    {
        return $this->hasMany(Problem::class);
    }

    public function proposal()
    {
        return $this->hasMany(Proposal::class);
    }

    public function suggestion()
    {
        return $this->hasMany(Suggestion::class);
    }
}
