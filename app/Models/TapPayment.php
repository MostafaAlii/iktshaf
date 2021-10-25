<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TapPayment extends Model
{
    protected $table = 'tap_payments';
    protected $fillable = [
        'UserName',
        'Password',
        'api_key',
        'Authorization', 
        'currency', 
        'live',
        'statue',        
    ];
}
