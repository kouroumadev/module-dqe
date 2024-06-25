<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_dossier',
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
        'status',
    ];

    public function clotures()
    {
        return $this->hasMany(Cloture::class, 'reclamation_id');
    }
}