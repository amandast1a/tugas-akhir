<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_strukturals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type')->default('formulir usulan kenaikan pangkat struktural');
            $table->boolean('is_active')->default(true);
            $table->String('level')->default('pengusul');
            $table->String('periode');
            $table->String('nama');
            $table->foreignId('status_id')->constrained()->onDelete('cascade')->default('1');
            $table->String('nip');
            $table->String('golongan');
            $table->String('jabatan');
            $table->date('date');
            $table->datetime('time')->useCurrent();
            $table->string('nomor_wa');
            $table->string('unit_kerja');
            $table->text('keterangan')->nullable();
            $table->text('file')->nullable();
            $table->String('doc_suratPengantar');
            $table->String('doc_pangkatTerakhir');
            $table->String('doc_jabatanAtasan');
            $table->String('doc_penilaian2022');
            $table->String('doc_penilaian2023');
            $table->String('doc_jabatanLama');
            $table->String('doc_jabatanBaru');
            $table->String('doc_beritaAcarasumpahlama');
            $table->String('doc_beritaAcarasumpahbaru');
            $table->String('doc_pernyataanPelantikanlama');
            $table->String('doc_pernyataanPelantikanbaru');
            $table->String('doc_riwayatAtasan');
            $table->String('doc_ujianDinas');
            $table->String('doc_skAlihtugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_strukturals');
    }
};
