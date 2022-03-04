<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tenants';

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
