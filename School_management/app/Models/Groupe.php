<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $table= 'groupes';
    protected $primaryKey = 'id_groupe';
    protected $fillable = [
        'Nom',
        'Effectif',
        'Filiére',
    ];

    public function filiéres(){
        $this->belongsTo(filiére::class,'id_filiére');
    }

    public function etudiants(){
        $this->hasMany(Etudiant::class,'id_etudiant');
    }

    public function profs(){
        $this->hasMany(Prof::class,'id_prof');
    }
}
