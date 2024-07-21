<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Istjob extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'location',
        'description',
        'category',
        'position',
        'experience',
        'qualifications_id',
    ];

    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }
}
