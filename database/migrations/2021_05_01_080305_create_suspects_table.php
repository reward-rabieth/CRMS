<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspects', function (Blueprint $table) {
            $table->id("suspect_id");
            $table->string("name");
            $table->string("address");
            $table->string("gender");
            $table->string("occupation");
            $table->string("dateOfBirth");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suspects');
    }
}
