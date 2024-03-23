<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence_etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
        'MasseHoraire',
        'Etudiant',
        'Date'
    ];
}
