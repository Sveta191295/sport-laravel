<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WomenClothing extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'image'];
}
