<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            // Primary Key sesuai skema Anda
            $table->id('id_anggota'); 
            
            // Foreign Key ke tabel users
            // Asumsi tabel users memiliki Primary Key 'id'
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); 

            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('nim')->unique();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};