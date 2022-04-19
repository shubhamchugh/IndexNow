<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domain extends Model
{
    use HasFactory;
    protected $fillable = [
        'domain',
        'google_json',
        'bing_api',
    ];
}
