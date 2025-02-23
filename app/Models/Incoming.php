<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'number',
        'title',
        'letter_number',
        'letter_date',
        'detail',
        'letter',
        'id_type',
        'id_admin',
        'id_hadmaster',
        'status',
        'status_teacher'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function type()
    {
        return $this->belongsTo(IncomingType::class, 'id_type');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    public function headmaster()
    {
        return $this->belongsTo(Headmaster::class, 'id_headmaster');
    }

    public function disposition()
    {
        return $this->hasMany(Disposition::class, 'id_incoming');
    }
}
