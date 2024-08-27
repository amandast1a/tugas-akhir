<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = "notification";
    protected $primarykey = "id";
    protected $fillable = [
        'user_id',
        'form_fungsionals_id',
        'form_regulars_id',
        'form_strukturals_id',
        'form_ijazahs_id',
        'status',
        'type',
        'data',
        'read',
    ];

    /**
     * Get the user that owns the notification.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the form fungsional that owns the notification.
     */
    public function formFungsional()
    {
        return $this->belongsTo(Form_jabatan_fungsional::class, 'form_fungsionals_id');
    }
    public function formRegular()
    {
        return $this->belongsTo(Form_regular::class, 'form_regulars_id');
    }
    public function formStruktural()
    {
        return $this->belongsTo(Form_struktural::class, 'form_strukturals_id');
    }
    public function formIjazah()
    {
        return $this->belongsTo(Form_ijazah::class, 'form_ijazahs_id');
    }

}
