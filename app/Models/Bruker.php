<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bruker extends Model
{
    use HasFactory;
    protected $table = 'bruker';
    protected $fillable = ['passord', 'fornavn', 'etternavn', 'epost', 'telefonnr', 'adresse', 'created_at', 'updated_at'];

    public function bigårder()
    {
        return $this->hasMany(Bigård::class, 'bruker_idBruker');
    }
}
