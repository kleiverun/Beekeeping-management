<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiGård extends Model
{
    use HasFactory;
    private $idBigård;
    private $bruker_idBruker;
    private $adresse;
    private $tidLaget;
}
