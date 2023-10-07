<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikubeEndringer extends Model
{
    use HasFactory;
    private $idBikubeEndringer;
    private $bikube_idBikube;
    private $antallSkattekasser;
    private $estimertStyrke;
    private $tidEndret;
}
