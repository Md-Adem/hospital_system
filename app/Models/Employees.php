<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'code', 'status'];
    protected $table = 'employees';
    public $timestamps = true;
}
