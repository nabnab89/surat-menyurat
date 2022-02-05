<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nip',
        'id_user',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function incoming()
    {
        return $this->hasMany(Incoming::class, 'id_teacher');
    }

    public function outgoing()
    {
        return $this->hasMany(Outgoing::class, 'id_teacher');
    }
}
