<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("purchase_id");
            $table->unsignedBigInteger("product_format_id");
            $table->integer("amount");
            $table->double("price");
            $table->timestamps();

            $table->foreign("purchase_id")->references("id")->on("purchases");
            $table->foreign("product_format_id")->references("id")->on("product_formats");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_purchases');
    }
}
