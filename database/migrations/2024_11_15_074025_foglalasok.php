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
        Schema::create('foglalasok', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->integer('konyv_id');
            $table->date('rent_start');
            $table->date('rent_end')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('foglalasok', function (Blueprint $table) {
            $table->dropColumn('rent_end'); // rent_end oszlop eltávolítása
        });
    }
};
