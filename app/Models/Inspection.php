<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $fillable =[ 'hive_id', 'inspectionDate', 'description', 'created_at', 'updated_at'];
}
