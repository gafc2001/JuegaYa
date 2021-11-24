<?php

use App\Models\Sport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string("sport");
            $table->timestamps();
        });
        Sport::create(['sport' => 'Futbol']);
        Sport::create(['sport' => 'Boleyball']);
        Sport::create(['sport' => 'Basketball']);
        Sport::create(['sport' => 'Tenis']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sports');
    }
}
