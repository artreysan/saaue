<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(User::class,  'user_id');
    }

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class,  'collaborator_id');
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
