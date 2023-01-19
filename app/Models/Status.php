<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    public function problem()
    {
        return $this->hasMany(Problem::class);
    }

    public function proposal()
    {
        return $this->hasMany(Proposal::class);
    }
}
