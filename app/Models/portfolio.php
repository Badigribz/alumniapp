<?php

namespace App\Models;

use App\Models\User;
use App\Models\mylinks;
use App\Models\myservices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'about_me', 
        'phone_number', 
        'profession',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(myservices::class);
    }

    public function links()
    {
        return $this->hasMany(mylinks::class);
    }
}