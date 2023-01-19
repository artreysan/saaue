<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'short_name',
        'acronym',
        'unit',
        'permission_id',
        'user_id',
        'collaborator_id',
        'equipment_id',
        'database_id',
    ];

    public function level()
    {
        return $this->hasMany(Level::class,  'permission_id');
    }

    public function user()
    {
        return $this->hasMany(User::class,  'user_id');
    }

    public function collaborator()
    {
        return $this->hasMany(Collaborator::class,  'collaborator_id');
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class,  'equipment_id');
    }

    public function database()
    {
        return $this->hasMany(Database::class,  'database_id');
    }

}
