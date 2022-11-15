<?php

namespace App\Models;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointments extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'appointments';
    public $timestamps = true;





    public function employees()
    {
        return $this->belongsTo(Employees::class, 'employees_name');
    }
}
