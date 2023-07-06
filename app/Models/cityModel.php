<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cityModel extends Model
{
    use HasFactory;
       protected $table = 'city';
        protected $primaryKey = 'id';

     public function state()
        {
            return $this->belongsTo('App\Models\stateModel','state_id');
        }
}