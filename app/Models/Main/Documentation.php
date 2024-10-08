<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    protected $table = 'documentation';

    protected $fillable = [
            'client_id',
            'documentation_request_date',
            'documentation_title',
            'documentation_description',
        ];

    public $timestamps = true;
}