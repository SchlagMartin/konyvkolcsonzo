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
            $table->unsignedBigInteger('konyv_id')->foreignId('konyv_id')->constrained()->onDelete('cascade');
            $table->string('email');
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
            $table->dropColumn('rent_end');
        });
    }
};
