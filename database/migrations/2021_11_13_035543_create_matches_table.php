<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("host_user_id");
            $table->unsignedBigInteger("match_status_id");
            $table->unsignedBigInteger("sport_id");
            $table->datetime("date_time");
            $table->integer("max_participants");
            $table->string("location");

            $table->foreign("host_user_id")->references("id")->on("users");
            $table->foreign("match_status_id")->references("id")->on("match_statuses");
            $table->foreign("sport_id")->references("id")->on("sports");
            
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
        Schema::dropIfExists('matches');
    }
}
