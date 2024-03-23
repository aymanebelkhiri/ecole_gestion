<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiliéresProf extends Model
{
    use HasFactory;
    protected $table='filiéres_profs';
    protected $primayKey = 'id';  
    protected $fillable = [
        'id_prof',
        'id_filiére'
    ] ;

}
