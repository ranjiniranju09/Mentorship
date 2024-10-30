<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionRecordingsTable extends Migration
{
    public function up()
    {
        Schema::create('session_recordings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_type');
            $table->unsignedBigInteger('session_title_id'); // Column for session_title_id
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
            $table->softDeletes(); // Adds 'deleted_at'
        });
    }
}
