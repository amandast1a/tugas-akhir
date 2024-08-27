<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = "statuses";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'status','time',
    ];

    public function Form_jabatan_fungsional()
    {
        return $this->hasMany(Form_jabatan_fungsional::class);
    }
    public function Form_regular()
    {
        return $this->hasMany(Form_regular::class);
    }
    public function Form_struktural()
    {
        return $this->hasMany(Form_struktural::class);
    }
    public function Form_ijazah()
    {
        return $this->hasMany(Form_ijazah::class);
    }
}
