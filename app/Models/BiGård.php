<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bigård extends Model
{
    use HasFactory;
    protected $table = 'bigård';
    protected $fillable = ['navn', 'bruker_idBruker', 'adresse', 'created_at', 'updated_at'];
}
