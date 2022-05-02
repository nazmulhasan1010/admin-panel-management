<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testomonials extends Model
{
    public $table = 'testomonials';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timeStamps = false;
}
