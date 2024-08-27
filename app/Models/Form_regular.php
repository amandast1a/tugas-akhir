<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_regular extends Model
{
    use HasFactory;
    protected $table = "form_regulars";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'user_id', 'status_id', 'golongans_id', 'periode', 'nama', 'status', 'nip', 'keterangan', 'jabatan', 'unit_kerja', 'file', 'date', 'time', 'nomor_wa', 'doc_suratPengantar', 'doc_pangkatTerakhir', 'doc_jabatanAtasan', 'doc_tandaLulus', 'doc_skAlihtugas', 'doc_penilaian2022', 'doc_penilaian2023', 'doc_skCpns', 'doc_skPns', 'doc_STTPL', 'doc_beritaAcarasumpah', 'doc_ijazah', 'doc_transkrip',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the notifications for the form jabatan fungsional.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'form_regulars_id');
    }

}
