<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupe_Prof extends Model
{
    use HasFactory;
    protected $table = 'groupe_profs';
    protected $fillable = [
        'Groupe',
        'Prof'
    ];
}
