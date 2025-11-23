<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Snack extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price'];

    //
}
