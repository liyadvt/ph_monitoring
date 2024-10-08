<?php

namespace App\Models\Proaccounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $connection = 'proaccounting';
    protected $table = 'journal';
}
