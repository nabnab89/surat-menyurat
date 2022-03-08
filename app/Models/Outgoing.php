<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outgoing extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'letter',
        'id_type',
        'id_admin',
        'id_teacher',
        'id_headmaster',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function type()
    {
        return $this->belongsTo(OutgoingType::class, 'id_type');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher');
    }

    public function headmaster()
    {
        return $this->belongsTo(Headmaster::class, 'id_headmaster');
    }
}
