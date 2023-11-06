<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bikube extends Model
{
    use HasFactory;
    protected $table = 'bikube';
    protected $fillable = ['bigård_idBigård', 'users_id', 'antallSkattekasser', 'identifikasjon', 'estimertStyrke', 'created_at', 'updated_at'];
}
