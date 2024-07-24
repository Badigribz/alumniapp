<?php

namespace App\Models;

use App\Models\portfolio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class myservices extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id', 
        'service', 
        'description',
    ];

    public function portfolio()
    {
        return $this->belongsTo(portfolio::class);
    }
}
