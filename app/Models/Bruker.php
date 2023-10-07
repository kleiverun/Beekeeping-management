<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bruker extends Model
{
    use HasFactory;
    private $idBruker;
    private $passord;
    private $fornavn;
    private $etternavn;
    private $epost;
    private $telefonnr;
    private $adresse;
}
