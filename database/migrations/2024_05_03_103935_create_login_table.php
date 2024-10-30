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
        Schema::create('logins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('mobile');
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();

            // Add foreign key constraint
            // $table->foreign('id')->references('lid')->on('mentors')->onDelete('cascade');
            // If you want to allow login for mentees as well, uncomment the line below
            // $table->foreign('id')->references('lid')->on('mentees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login');
    }
};
