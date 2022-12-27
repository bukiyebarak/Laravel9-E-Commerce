<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('product_id');
            $table->integer('paket_category_id');
            $table->integer('category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('title',150);
            $table->string('keywords')->nullable();
            $table->string('image',75)->nullable();
            $table->string('description',250)->nullable();
            $table->text('detail')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('tax')->default(10);
            $table->string('slug',100)->nullable();
            $table->string('status',5)->nullable()->default('False');
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
        Schema::dropIfExists('paket_products');
    }
};
