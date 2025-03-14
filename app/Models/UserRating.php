<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
    use HasFactory;

    protected $table = 'women_db.user_ratings';

    // // ✅ Allow mass assignment for these fields
    protected $fillable = ['name', 'image_url', 'rating'];
}