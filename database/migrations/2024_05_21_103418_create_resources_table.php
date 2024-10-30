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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mentorId');
            $table->string('title');
            $table->text('description');
            $table->string('file_path')->nullable();
            $table->string('link')->nullable();
            $table->enum('visibility', ['public', 'mentees', 'specific_groups']);
            $table->boolean('is_approved')->default(false);
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('mentorId')->references('id')->on('mentors')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
