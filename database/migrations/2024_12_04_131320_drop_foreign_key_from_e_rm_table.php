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
            $table->dropForeign(['examination_type_id']); // Menghapus foreign key
        });
    }

    public function down()
    {
        Schema::table('e_rm', function (Blueprint $table) {
            $table->foreign('examination_type_id')->references('id')->on('examination_types')->onDelete('cascade'); // Menambahkan foreign key lagi jika rollback
        });
    }

};
