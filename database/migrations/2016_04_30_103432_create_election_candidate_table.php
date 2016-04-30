<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_candidate', function (Blueprint $table) {
            $table->integer('election_id')->unsigned()->index();
            $table->foreign('election_id')->references('id')->on('election')->onDelete('cascade');
            $table->integer('candidate_id')->unsigned()->index();
            $table->foreign('candidate_id')->references('id')->on('candidate')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('election_candidate');
    }
}
