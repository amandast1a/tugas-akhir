<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $table = "pages";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'type','level', 'is_active'
    ];
}
