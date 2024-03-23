<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;
    protected $table = 'emploi';
    public function module () 
    {
        return $this->belongsTo(Module::class,'id_module');
    }
    public function prof (){
        return $this->belongsTo(Prof::class,'id_prof');
    }
    public function filiere() {
        return $this->belongsTo(Filiére::class,'id');
    }
}
