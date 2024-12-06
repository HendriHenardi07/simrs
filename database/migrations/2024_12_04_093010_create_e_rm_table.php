<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('e_rm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade'); // Relasi dengan pasien
            $table->foreignId('examination_id')->constrained()->onDelete('cascade'); // Relasi dengan pemeriksaan
            $table->foreignId('examination_type_id')->constrained('examination_types')->onDelete('cascade'); // Relasi dengan jenis pemeriksaan
            $table->text('diagnosis');
            $table->text('treatment');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('e_rm');
    }
};
