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
        Schema::create('candregs', function (Blueprint $table) {
            $table->id();
            $table->string('studentID');
            $table->string('name');
            $table->string('pname');
            $table->string('gender');
            $table->string('birthDate')->nullable();
            $table->string('course');
            $table->string('phoneNumber');
            $table->string('address')->nullable();
            $table->string('a-card')->nullable();
            $table->string('admissionDate');
            $table->string('certNumber')->nullable();
            $table->string('status')->nullable();
            $table->string('mode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candregs');
    }
};
//studentID,name, pname, gender,dob,course,mobile, address, a-card,doa,cert_no,status,mode