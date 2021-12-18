<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $table ='collections';

    public function test(){
        return $this->belongsTo('App\Models\test');
    }
    public function answer(){
        return $this->hasMany('App\Models\UserAnswer','collection_id','id');
    }
    public function question(){
        return $this->hasMany('App\Models\Question','collection_id','id');
    }
}
