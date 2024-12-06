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
        Schema::create('laboratory_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade'); // Relasi dengan pasien
            $table->foreignId('examination_id')->constrained()->onDelete('cascade'); // Relasi dengan pemeriksaan
            $table->text('result')->nullable(); // Hasil pemeriksaan laboratorium
            $table->date('test_date'); // Tanggal pemeriksaan
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
        Schema::dropIfExists('laboratory_tests');
    }
};
