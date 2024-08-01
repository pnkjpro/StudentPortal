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
        Schema::create('fee_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candreg_id');
            $table->date('feeDate')->nullable();
            $table->Integer('feeAmount')->nullable();
            $table->string('status')->default('regular');
            $table->timestamps();
            
            $table->foreign('candreg_id')
                ->references('id')
                ->on('candregs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_records');
    }
};
