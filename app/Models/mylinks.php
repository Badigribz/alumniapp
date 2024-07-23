<?php

namespace App\Models;

use App\Models\portfolio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mylinks extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id', 
        'link', 
        'work_category',
    ];

    public function portfolio()
    {
        return $this->belongsTo(portfolio::class);
    }
}
