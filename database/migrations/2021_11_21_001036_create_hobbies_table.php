<?php

use App\Models\Hobbie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobbies', function (Blueprint $table) {
            $table->id();
            $table->string('hobbie');
            $table->timestamps();
        });
        Hobbie::create(['hobbie'=>"Jugar partido con mis amigos"]);
        Hobbie::create(['hobbie'=>"Estudiar"]);
        Hobbie::create(['hobbie'=>"Salir a distraerte"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobbies');
    }
}
