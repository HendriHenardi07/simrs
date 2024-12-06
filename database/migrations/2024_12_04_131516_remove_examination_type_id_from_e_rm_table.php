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
        Schema::table('e_rm', function (Blueprint $table) {
            $table->dropColumn('examination_type_id'); // Menghapus kolom
        });
    }

    public function down()
    {
        Schema::table('e_rm', function (Blueprint $table) {
            $table->foreignId('examination_type_id')->constrained('examination_types')->onDelete('cascade'); // Menambahkan kolom jika rollback
        });
    }

};
