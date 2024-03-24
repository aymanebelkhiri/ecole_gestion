<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiére extends Model
{
    use HasFactory;
    protected $table='filiéres';
    protected $primayKey = 'id';  
    protected $fillable = [
        'Nom',
        'Domaine',
        'Description',
        'photo'
    ] ;

    public function etudiants(){
        $this->hasMany(Etudiant::class,'id_etudiant');
    }

    public function Modules(){
        $this->hasMany(Module::class,'id_module');
    }

}
