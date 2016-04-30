<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCandidateIdToVoterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voter', function (Blueprint $table) {
            $table->integer('candidate_id')->unsigned()->nullable();
            $table->foreign('candidate_id')
                ->references('id')
                ->on('candidate')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voter', function (Blueprint $table) {
            //
        });
    }
}
