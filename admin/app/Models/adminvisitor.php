<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminvisitor extends Model
{
    public $table = 'adminpanelvisitors';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timeStamps = false;
}
