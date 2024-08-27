<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_ijazah extends Model
{
    use HasFactory;
    protected $table = "form_ijazahs";
    protected $primarykey = "id";
    protected $fillable = [
        'id',
        'user_id',
        'type',
        'is_active',
        'level',
        'periode',
        'nama',
        'status',
        'nip',
        'golongan',
        'jabatan',
        'date',
        'time',
        'nomor_wa',
        'unit_kerja',
        'keterangan',
        'file',
        'doc_suratPengantar',
        'doc_pangkatTerakhir',
        'doc_jabatanAtasan',
        'doc_penilaian2022',
        'doc_penilaian2023',
        'doc_pakKonvensional',
        'doc_pakIntegrasi',
        'doc_pakKonversi',
        'doc_ujiKopetensi',
        'doc_izinBelajar',
        'doc_uraianTugaslama',
        'doc_uraianTugasbaru',
        'doc_suratTandakelulusan',
        'doc_ijazah',
        'doc_transkripNilai',
        'doc_sertifikatAkreditasi',
        'doc_pangkalanData',
        'doc_skAlihtugas',
        'doc_skJF'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'form_ijazahs_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
