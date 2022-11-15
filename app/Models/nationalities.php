<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nationalities extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'nationalities';
    public $timestamps = true;
}
