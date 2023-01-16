<?php

namespace App\Models;

use App\Models\Collaborator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Petition extends Model
{
    use HasFactory;

    protected $fillable = [
        'collaborator_id',
        'fileID',
        'user_id',
        'equipment_id',
        'enterprise_id',
        'nodo',
        'internet',
        'ip',
        'vpn',
        'status',
        'account_gitlab',
        'account_jira',
        'account_glpi',
        'account_da',
        'tk_glpi_account_1',
        'tk_gitlab_account_1',
        'tk_jira_account_1',
        'tk_da_account_1',
        'tk_glpi_account_0',
        'tk_gitlab_account_0',
        'tk_jira_account_0',
        'tk_da_account_0',
        'tk_nodo_1',
        'tk_internet_1',
        'tk_ip_1',
        'tk_vpn_1',
        'tk_nodo_0',
        'tk_internet_0',
        'tk_ip_0',
        'tk_vpn_0',
        'tk_vpn_0',
    ];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class,  'collaborator_id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class,  'equipment_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function service()
    {
        return $this->hasMany(Service::class,'service_id');
    }

}
