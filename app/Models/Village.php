<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    public $fillable = ['user_id', 'kecamatan', 'provinsi', 'kota'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function problem()
    {
        return $this->hasMany(Problem::class);
    }

    public function suggestion()
    {
        return $this->hasMany(Suggestion::class);
    }
}
