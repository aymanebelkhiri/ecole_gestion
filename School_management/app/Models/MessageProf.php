<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageProf extends Model
{
    use HasFactory;
    protected $table = 'message_to_prof';
    protected $fillable = [
        'Message',
        'Etudiant',
        'Prof',
    ];
}
