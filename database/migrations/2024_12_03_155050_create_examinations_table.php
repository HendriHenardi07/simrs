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
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id'); // Relasi dengan pasien
            $table->unsignedBigInteger('examination_type_id'); // Relasi dengan jenis pemeriksaan
            $table->text('description');  // Deskripsi pemeriksaan
            $table->date('date');  // Tanggal pemeriksaan
            $table->timestamps();

            // Menambahkan foreign key untuk relasi dengan tabel pasien
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

            // Menambahkan foreign key untuk relasi dengan tabel jenis pemeriksaan
            $table->foreign('examination_type_id')->references('id')->on('examination_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examinations');
    }
};

