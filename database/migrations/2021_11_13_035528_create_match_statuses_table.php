<?php

use App\Models\MatchStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_statuses', function (Blueprint $table) {
            $table->id();
            $table->string("status");
            $table->timestamps();
        });
        MatchStatus::create(['status' => 'Previa']);
        MatchStatus::create(['status' => 'En juego']);
        MatchStatus::create(['status' => 'Finalizado']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_statuses');
    }
}
