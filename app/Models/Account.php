<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_gitlab',
        'account_jira',
        'account_glpi',
        'account_da',
        'collaborator_id',

    ];


    public function collaborator()
    {
        return $this->hasMany(Collaborator::class,  'collaborator_id');
    }



}
