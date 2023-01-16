<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'tipo',
        'marca',
        'modelo',
        'serie',
        'mach_ethernet',
        'mac_wifi',
        'enterprise_id',
        'collaborator_id',
    ];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class, 'collaborator_id');
    }

    public function petition()
    {
        return $this->belongsTo(Petition::class,  'petition_id');
    }

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'enterprise_id');
    }


}
