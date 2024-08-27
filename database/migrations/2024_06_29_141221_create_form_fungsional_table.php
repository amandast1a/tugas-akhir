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
        Schema::create('form_fungsional', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('formulir usulan kenaikan pangkat jabatan fungsional');
            $table->String('periode');
            $table->String('nama');
            $table->foreignId('status_id')->constrained()->onDelete('cascade')->default('1');
            $table->String('nip');
            $table->String('golongan');
            $table->String('jabatan');
            $table->date('date');
            $table->datetime('time');
            $table->string('nomor_wa');
            $table->text('keterangan')->nullable();
            $table->text('file')->nullable();
            $table->String('doc_suratPengantar');
            $table->String('doc_skPangkat');
            $table->String('doc_pakKonvensional');
            $table->String('doc_pakIntegrasi');
            $table->String('doc_pakKonversi');
            $table->String('doc_penilaian2022');
            $table->String('doc_penilaian2023');
            $table->String('doc_jabatanAtasan');
            $table->String('doc_jabatanLama');
            $table->String('doc_jabatanTerakhir');
            $table->String('doc_pendidik');
            $table->String('doc_uji');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_fungsional');
    }
};
