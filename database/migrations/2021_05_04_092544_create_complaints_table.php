<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('complainantName');
            $table->string('complainantNID');
            $table->string('complainantContacts');
            $table->string('complainantAddress');
            $table->string('defendantName');
            $table->string('defendantNID');
            $table->string('defendantContacts');
            $table->string('defendantAddress');
            $table->string('defendantRelationship');
            $table->unsignedBigInteger('police_id');
            $table->unsignedBigInteger('investigator_id')->nullable();
            $table->string('report',5000);
            $table->string('status')->default('Pending');
            $table->string('remarks')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->index('police_id');
            $table->index('investigator_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
