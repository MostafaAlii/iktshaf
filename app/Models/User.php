<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    /*protected $fillable = [
        'name',
        'email',
        'mobile_num',
        'password',
        'facebook_id',
        'photo',
        'google_id',
        'isVerified',
    ];*/
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // User Like Article ( Many To Many Relation )
    public function likes() {
        return $this->hasMany(User::class);
    }
    public function point() {
        return $this->hasMany(Membership::class);
    }
    public function Membership() {
         $members=$this->point()->sum('point');
        $membership =Point::where('max_point','>=',$members)->where('min_point','<=',$members)->first();
        $membership_last =Point::latest()->first();
        if($members > $membership_last->max_point){
            return $membership_last->type_name;
        }else{
            return $membership->type_name;
        }
    }


}
