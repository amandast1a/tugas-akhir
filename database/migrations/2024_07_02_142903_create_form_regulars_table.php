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
        Schema::create('form_regulars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type')->default('formulir usulan kenaikan pangkat reguler');
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
            $table->String('doc_tandaLulus');
            $table->String('doc_skAlihtugas');
            $table->String('doc_penilaian2022');
            $table->String('doc_penilaian2023');
            $table->String('doc_skCpns');
            $table->String('doc_skPns');
            $table->String('doc_STTPL');
            $table->String('doc_beritaAcarasumpah');
            $table->String('doc_ijazah');
            $table->String('doc_transkrip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_regulars');
    }
};
