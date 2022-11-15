<?php

namespace App\Models;

use App\Models\sections;
use App\Models\nationalities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class doctors extends Model
{
    use HasFactory;

    // protected $fillable = [''];
    protected $guarded = [];
    protected $table = 'doctors';
    public $timestamps = true;


    public function nationalities()
    {
        return $this->belongsTo(nationalities::class, 'doctor_nationalities');
    }


    public function sections()
    {
        return $this->belongsTo(sections::class, 'doctor_sections');
    }
}
