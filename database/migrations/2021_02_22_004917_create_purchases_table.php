<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->double("total");
            $table->unsignedBigInteger("bank_id");
            $table->string("buyer_name");
            $table->string("buyer_lastname");
            $table->string("buyer_phone");
            $table->string("buyer_email");
            $table->string("buyer_address");
            $table->string("bank_reference")->nullable();
            $table->string("status")->default("pending");
            $table->timestamps();

            $table->foreign("bank_id")->references("id")->on("banks");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
