<?php

namespace App\Models\Proaccounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $connection = 'proaccounting';
    protected $table = 'setting';
}
