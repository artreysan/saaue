<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'contract',

    ];

    public function collaborator()
    {
        return $this->hasMany(Collaborator::class,  'collaborator_id');
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class,  'equipment_id');
    }

    public function petitions()
    {
        return $this->hasMany('App\Petition');
    }

}
