<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionVoterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_voter', function (Blueprint $table) {
            $table->integer('election_id')->unsigned()->index();
            $table->foreign('election_id')->references('id')->on('election')->onDelete('cascade');
            $table->integer('voter_id')->unsigned()->index();
            $table->foreign('voter_id')->references('id')->on('voter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('election_voter');
    }
}
