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
        Schema::create('hospital_emergencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');  // Relasi dengan tabel patients
            $table->timestamp('arrival_time');
            $table->text('symptoms');
            $table->text('initial_diagnosis')->nullable();
            $table->enum('status', ['Waiting', 'In Treatment', 'Discharged', 'Transferred to Inpatient'])->default('Waiting');
            $table->foreignId('room_id')->nullable()->constrained()->onDelete('set null'); // Relasi dengan tabel rooms (opsional)
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
        Schema::dropIfExists('hospital_emergencies');
    }
};
