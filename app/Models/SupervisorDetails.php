<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SupervisorDetails extends Model
{
    use HasFactory;
    protected $table = 'supervisor_details';
    protected $guarded = [];
    public $timestamps = true;
}
