<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hive extends Model
{
    use HasFactory;
    protected $table = 'hive';
    protected $fillable = ['apiary_idApiary', 'users_id', 'antallSkattekasser', 'identifikasjon', 'estimertStyrke', 'created_at', 'updated_at'];
}
