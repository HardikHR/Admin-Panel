<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stateModel extends Model
{
    use HasFactory;
        protected $table = 'state';
        protected $primaryKey = 'id';
}

