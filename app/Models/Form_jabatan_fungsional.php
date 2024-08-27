<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_jabatan_fungsional extends Model
{
    use HasFactory;
    protected $table = "form_fungsionals";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'user_id', 'status_id', 'periode', 'nama', 'status', 'nip', 'deskripsi', 'golongan', 'jabatan', 'unit_kerja', 'date', 'time', 'file', 'nomor_wa', 'doc_suratPengantar', 'doc_skPangkat', 'doc_pakKonvensional', 'doc_pakIntegrasi', 'doc_pakKonversi', 'doc_penilaian2022', 'doc_penilaian2023', 'doc_jabatanAtasan', 'doc_jabatanLama', 'doc_jabatanTerakhir', 'doc_pendidik', 'doc_uji',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }



    /**
     * Get the notifications for the form jabatan fungsional.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'form_fungsionals_id');
    }

}
