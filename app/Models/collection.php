<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collection extends Model
{
    use HasFactory;

    public function collection(){
        return $this->hasOne('App\Models\test','id','test_id');
    }
}
