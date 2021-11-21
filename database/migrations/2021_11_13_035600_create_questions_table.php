<?php

use App\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("question");
            $table->string("type_question");
            $table->timestamps();
        });
        Question::create([
            'question' => '¿Cuál es tu deporte favorito?',
            'type_question' => 'SPORT'
        ]);
        Question::create([
            'question' => '¿En qué posición juegas?',
            'type_question' => 'POSITION'
        ]);
        Question::create([
            'question' => '¿Cuánto tiempo llevas jugando fútbol?',
            'type_question' => 'TIME_PLAYING'
        ]);
        Question::create([
            'question' => '¿Por tus ratos libres que sueles hacer?',
            'type_question' => 'HOBBIE'
        ]);
        Question::create([
            'question' => '¿Cuál es tu genero u orientacion sexual?',
            'type_question' => 'GENDER'
        ]);
        Question::create([
            'question' => '¿Que edad tienes?',
            'type_question' => 'AGE'
        ]);
    }

    /**
     * Reverse the migrations.  
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
