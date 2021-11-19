<?php

use App\Models\District;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('district');
            $table->timestamps();
        });
        District::create(['district'=>'Callao']);
        District::create(['district'=>'Ate Vitarte']);
        District::create(['district'=>'Barranco']);
        District::create(['district'=>'Breña']);
        District::create(['district'=>'Carabayllo']);
        District::create(['district'=>'Chaclacayo']);
        District::create(['district'=>'Chorrillos']);
        District::create(['district'=>'Cieneguilla']);
        District::create(['district'=>'Comas']);
        District::create(['district'=>'El Agustino']);
        District::create(['district'=>'Independencia']);
        District::create(['district'=>'Jesús María']);
        District::create(['district'=>'La Molina']);
        District::create(['district'=>'Lima']);
        District::create(['district'=>'Lince ']);
        District::create(['district'=>'Los Olivos']);
        District::create(['district'=>'Lurigancho']);
        District::create(['district'=>'Lurín']);
        District::create(['district'=>'Magdalena del Mar']);
        District::create(['district'=>'Miraflores']);
        District::create(['district'=>'Pachacamac']);
        District::create(['district'=>'Pueblo Libre']);
        District::create(['district'=>'Puente Piedra']);
        District::create(['district'=>'Punta Hermosa']);
        District::create(['district'=>'Punta Negra']);
        District::create(['district'=>'Rímac']);
        District::create(['district'=>'San Bartolo']);
        District::create(['district'=>'San Borja']);
        District::create(['district'=>'San Isidro']);
        District::create(['district'=>'San Juan de Lurigancho']);
        District::create(['district'=>'San Juan de Miraflores']);
        District::create(['district'=>'San Luis']);
        District::create(['district'=>'San Martin de Porres']);
        District::create(['district'=>'San Miguel']);
        District::create(['district'=>'Santa Anita']);
        District::create(['district'=>'Santa Maria del Mar']);
        District::create(['district'=>'Santa Rosa']);
        District::create(['district'=>'Santiago de Surco']);
        District::create(['district'=>'Surquillo']);
        District::create(['district'=>'Villa El Salvador']);
        District::create(['district'=>'Villa María del Triunfo']);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
