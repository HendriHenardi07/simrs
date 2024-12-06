<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('radiology_tests', function (Blueprint $table) {
        $table->id();
        $table->foreignId('patient_id')->constrained('patients');  // Relasi ke tabel pasien
        $table->string('exam_type');  // Jenis pemeriksaan radiologi (X-ray, CT scan, dsb)
        $table->text('exam_result');  // Hasil pemeriksaan
        $table->date('exam_date');  // Tanggal pemeriksaan
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radiology_tests');
    }
};
