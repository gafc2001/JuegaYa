<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->unique();
            $table->unsignedBigInteger("sport_id")->nullable();
            $table->unsignedBigInteger("district_id")->nullable();
            $table->unsignedBigInteger('hobbie_id')->nullable();
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->date("age")->nullable();
            $table->double("high")->nullable();
            $table->date("time_playing")->nullable();
            $table->string("preferred_position")->nullable();
            $table->string("profile_picture")->nullable();
            $table->enum("gender",["Hombre","Mujer","Prefiero no decirlo"])->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("sport_id")->references("id")->on("sports");
            $table->foreign("district_id")->references("id")->on("districts");
            $table->foreign("hobbie_id")->references("id")->on("hobbies");
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
        Schema::dropIfExists('profiles');
    }
}
