<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    // protected $table = "permasalahan_desa";
    protected $guard = ['id'];

    // protected $primaryKey   = "permasalahan_desaID";

    protected $fillable = [
        'judul', 'deskripsi', 'saran', 'lampiran_1', 'lampiran_2', 'user_id', 'status_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function proposal()
    {
        return $this->hasMany(Proposal::class);
    }
}
