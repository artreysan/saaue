<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'short_name',
        'dbms',
        'so',
        'criticality',
        'level_id',
        'enviroment',
        'ip',
        'port',

    ];
}
