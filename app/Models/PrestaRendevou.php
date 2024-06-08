<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestaRendevou extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function natures()
    {
        return $this->hasMany(NatureRendevou::class, 'nature_id');
    }
}
