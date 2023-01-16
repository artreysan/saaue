<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'nodo',
        'internet',
        'ip',
        'vpn',
        'account_gitlab',
        'account_glpi',
        'account_jira',
        'account_da',
        'location_id',
        'rol_id',
        'equipment_id',
        'enterprise_id',
    ];


    //Llaves foraneas

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class,'rol_id');
    }

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class,'enterprise_id');
    }

    public function equipments()
    {
        return $this->hasMany(Enterprise::class, 'collaboration_id');
    }

}
