<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'vpn',
        'collaborator_id',
        'equipment_id',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class,  'rol_id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class,  'equipment_id');
    }
}
