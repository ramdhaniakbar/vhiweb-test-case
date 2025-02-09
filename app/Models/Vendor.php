<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 
        'email', 
        'password',
        'phone', 
        'company_name', 
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function setRememberToken($value) {}
    public function getRememberToken() {}
    public function getRememberTokenName() { return null; }
}
