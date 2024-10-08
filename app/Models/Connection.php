<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;

    protected $table = 'connection';

    protected $fillable = ([
        'client_code',
        'client_name',
        'proaccounting_database_ip',
        'proaccounting_database_port',
        'proaccounting_database_user',
        'proaccounting_database_password',
        'proaccounting_database_name',
        'prohukum_database_ip',
        'prohukum_database_port',
        'prohukum_database_user',
        'prohukum_database_password',
        'prohukum_database_name'
    ]);

    public $timestamps = false;
}
