<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersInfo extends Model
{
    public $table = 'users';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timeStamps = false;
}
