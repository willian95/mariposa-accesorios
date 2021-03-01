<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("category_id");
            $table->text("description");
            $table->string("image");
            $table->string("hover_image");
            $table->string("slug");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("category_id")->references("id")->on("categories");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
