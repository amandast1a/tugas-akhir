<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_struktural extends Model
{
    use HasFactory;
    protected $table = "form_strukturals";
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
        'doc_jabatanLama',
        'doc_jabatanBaru',
        'doc_beritaAcarasumpahlama',
        'doc_beritaAcarasumpahbaru',
        'doc_pernyataanPelantikanlama',
        'doc_pernyataanPelantikanbaru',
        'doc_riwayatAtasan',
        'doc_ujianDinas',
        'doc_skAlihtugas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'form_strukturals_id');
    }

}
