<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class template extends Model
{
    public $table = 'templates';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timeStamps = false;
}
