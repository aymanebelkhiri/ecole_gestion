<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_note';
    protected $fillable = [
        'Title',
        'Valeur',
        'Module',
        'Etudiant'
    ];

    public function modules(){
        $this->belongsTo(Module::class,'id_module');
    }

    public function etudiants(){
        $this->belongsTo(Etudiant::class,'id_etudiant');
    }
}
