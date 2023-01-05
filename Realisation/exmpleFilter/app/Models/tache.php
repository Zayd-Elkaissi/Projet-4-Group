<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tache extends Model
{
    use HasFactory;
    protected $table = "Preparation_tache";
    public $timestamps= false;
    protected $fillable = [
        'Nom_tache',
        'Duree',

    ];
}
