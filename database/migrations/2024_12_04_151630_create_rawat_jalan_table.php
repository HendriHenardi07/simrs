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
    // Migration for rawat_jalan table
    public function up()
    {
        Schema::create('rawat_jalan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->date('visit_date');
            $table->text('complaints'); // Keluhan yang disampaikan pasien
            $table->text('diagnosis');
            $table->text('treatment_plan');
            $table->date('follow_up_date')->nullable(); // Tanggal follow-up jika ada
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
        Schema::dropIfExists('rawat_jalan');
    }
};
