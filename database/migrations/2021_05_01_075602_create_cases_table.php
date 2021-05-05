<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id("caseNumber");
            $table->timestamp("date");
            $table->string("statement")->default('Pending');
            $table->unsignedBigInteger("report_id");
            $table->string("suspectName");
            $table->string("remarks");
            $table->string("sectionLaw")->default('Pending');
            $table->string("status")->default('Pending');
            $table->unsignedBigInteger('investigation_officer');

            $table->index("report_id");
            $table->index("investigation_officer");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases');
    }
}
