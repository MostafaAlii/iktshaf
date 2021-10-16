<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table ='articles';
    protected $fillable = [
        'title',
        'description',
        'photo',
        'content',
        'admin_id',
        'tags',
    ];
    public function admin_id(){
        return $this->hasOne('App\Admin','id','admin_id');
    }
}
