<?php

namespace App\Models;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'slug',
        '_is_bing_indexed',
        '_is_google_indexed',
    ];

    public function DomainName()
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    }
}
