<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_prof';
    protected $fillable =[
        "id_prof",
        'Nom',
        'Prenom',
        'Sexe',
        'Email',
        'Password',
        'Module',
    ];
}
