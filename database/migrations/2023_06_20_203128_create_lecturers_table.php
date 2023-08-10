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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('department')->nullable();
            $table->unsignedBigInteger('module')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('password');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->string('profile_picture')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('department')->references('id')->on('departments');
            $table->foreign('module')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
