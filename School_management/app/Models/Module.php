<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_module';
    
    protected $fillable = [
        'Nom',
        'MasseHoraire',
        'Coefficient',
        'description',
        'image_url',
        'Filiére',
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiére::class, 'Filiére');
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
