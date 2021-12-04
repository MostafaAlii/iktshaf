<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
    protected $table ='articles';
    protected $fillable = [
        'title',
        'photo',
        'content',
        'admin_id',
        'tags',
        'department_id',    
        'share',
        'views',

    ];
    public function department(){
        return $this->hasOne('App\Models\Department','id','department_id');
    }
    public function admin_id(){
        return $this->hasOne('App\Models\Admin','id','admin_id');
    }
    public function admin() {
        return $this->belongsTo(Admin::class);
    }
    // User Like Article ( Many To Many Relation )
    public function likes() {
        return $this->hasMany(User::class);
    }

    // User comments Article ( one To Many Relation )
    public function comments() {
        return $this->hasMany(Comments::class,'article_id','id')->orderByDesc('id');
    }
}


