<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_agents', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');

            $table->unsignedInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');

            $table->unsignedInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states');

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
        Schema::dropIfExists('search_agents');
    }
}
