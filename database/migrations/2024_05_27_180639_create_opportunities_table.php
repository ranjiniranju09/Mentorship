<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        */
        Schema::create('opportunities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('link');
            $table->string('opportunity_type');
            // $table->unsignedBigInteger('mentor_id'); // Add mentor_id column
            $table->timestamps();
            $table->softDeletes();
        
            // Add foreign key constraint
            // $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunities');
    }
}
