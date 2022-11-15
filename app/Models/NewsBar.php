<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsBar extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'content'];
    protected $table = 'news_bars';
    public $timestamps = true;
}
