<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $table = "golongans";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'golongan','time',
    ];
}
