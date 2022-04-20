<?php

namespace App\Models;

use App\Models\Checklist;
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

    public function slugList()
    {
        return $this->hasMany(Checklist::class, 'domain_id');
    }
}
