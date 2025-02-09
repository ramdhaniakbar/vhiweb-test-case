<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'email', 
        'password',
        'phone', 
        'company_name', 
        'status'
    ];

    protected $hidden = ['password'];

    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
