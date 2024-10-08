<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectionProhukum extends Model
{
    use HasFactory;

    protected $table = 'connection';

    protected $fillable = ([
        'client_code',
        'client_name',
        'prohukum_database_ip',
        'prohukum_database_port',
        'prohukum_database_user',
        'prohukum_database_password',
        'prohukum_database_name',
    ]);

    public $timestamps = false;
}
