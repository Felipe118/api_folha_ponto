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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->string('phone')->unique();
            $table->boolean('active')->nullable()->comment('Ativo');
            $table->date('date_termination')->nullable()->comment('Data de desligamento');
            $table->string('date_admission')->comment('Data de admissão')->nullable();
            $table->string('date_birth')->comment('Data de nascimento')->nullable();
            $table->string('user')->comment('usuario do sistema')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            // Foreign Key
            $table->foreignId('office_id')->nullable();
            $table->foreign('office_id')->references('id')->on('office');
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
