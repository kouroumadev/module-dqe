<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'numero',
        'nom',
        'prenom',
        'date_naiss',
        'add_email',
        'tel',
        'adresse',
        'prestation_id',
        'motifs_id',
        'details',
    ];
}
