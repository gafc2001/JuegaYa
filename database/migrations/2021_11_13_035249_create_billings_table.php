<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_membership_id");
            $table->unsignedBigInteger("payment_method_id");
            $table->datetime("payment_date");
            $table->date("start_date");
            $table->date("end_date");
            $table->timestamps();

            $table->foreign("user_membership_id")->references("id")->on("user_memberships");
            $table->foreign("payment_method_id")->references("id")->on("payment_methods");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billings');
    }
}
